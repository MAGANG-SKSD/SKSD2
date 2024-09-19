<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggaran;
use App\Models\Desa;
use App\Models\Detail_Norekening;
use App\Models\Jenis_Norekening;
use App\Models\Kelompok_Norekening;

class AnggaranController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->tahun || !$request->jenis) {
            return redirect('anggaran?jenis=pendapatan&tahun=' . date('Y'));
        }

        $anggaranQuery = Anggaran::whereTahun($request->tahun);

        if ($request->jenis == "pendapatan") {
            $anggaran = $anggaranQuery->whereHas('detail_norekening', function ($data) {
                $data->where('jenis_norekening_id', 4);
            })->latest()->paginate(10);
        } elseif ($request->jenis == "belanja") {
            $anggaran = $anggaranQuery->whereHas('detail_norekening', function ($data) {
                $data->where('jenis_norekening_id', 5);
            })->latest()->paginate(10);
        } elseif ($request->jenis == "pembiayaan") {
            $anggaran = $anggaranQuery->whereHas('detail_norekening', function ($data) {
                $data->where('jenis_norekening_id', 6);
            })->latest()->paginate(10);
        } elseif ($request->jenis == "laporan") {
            $detail_norekening = Detail_Norekening::all();
            $data = $this->laporan($request);
            return view('anggaran.laporan', compact('detail_norekening', 'data'));
        } elseif ($request->jenis == "grafik") {
            return view('anggaran.grafik');
        } else {
            return redirect('anggaran?jenis=pendapatan&tahun=' . date('Y'));
        }

        $anggaran->appends(request()->input())->links();

        return view('anggaran.index', compact('anggaran'));
    }

    public function laporan_apbdes(Request $request)
    {
        $detail_norekening = Detail_Norekening::all();
        $desa = Desa::find(1);
        $data = $this->laporan($request);

        if (!$request->tahun || !$request->jenis) {
            return redirect('laporan-apbdes?jenis=laporan&tahun=' . date('Y'));
        }

        if ($request->jenis == "laporan") {
            return view('anggaran.laporan-apbdes', compact('desa', 'detail_norekening', 'data'));
        } elseif ($request->jenis == "grafik") {
            return view('anggaran.grafik-apbdes-umum', compact('desa', 'detail_norekening', 'data'));
        } else {
            return redirect('laporan-apbdes?jenis=laporan&tahun=' . date('Y'));
        }
    }

    private function laporan($request)
    {
        $data['pendapatan_anggaran'] = 0;
        $data['belanja_anggaran'] = 0;
        $data['pembiayaan_anggaran'] = 0;

        foreach (Anggaran::whereTahun($request->tahun)->whereHas('detail_norekening', function ($jenis) {
            $jenis->where('jenis_norekening_id', 4);
        })->get() as $item) {
            $data['pendapatan_anggaran'] += $item->nilai_anggaran;
        }

        foreach (Anggaran::whereTahun($request->tahun)->whereHas('detail_norekening', function ($jenis) {
            $jenis->where('jenis_norekening_id', 5);
        })->get() as $item) {
            $data['belanja_anggaran'] += $item->nilai_anggaran;
        }

        foreach (Anggaran::whereTahun($request->tahun)->whereHas('detail_norekening', function ($jenis) {
            $jenis->where('kelompok_norekening_id', 61);
        })->get() as $item) {
            $data['penerimaan_biaya_anggaran'] += $item->nilai_anggaran;
        }

        foreach (Anggaran::whereTahun($request->tahun)->whereHas('detail_norekening', function ($jenis) {
            $jenis->where('kelompok_norekening_id', 62);
        })->get() as $item) {
            $data['pengeluaran_biaya_anggaran'] += $item->nilai_anggaran;
        }

        return $data;
    }

    public function cart(Request $request)
    {
        $pendapatan_anggaran = 0;
        $belanja_anggaran = 0;
        $pembiayaan_anggaran = 0;
        $tahun = $request->tahun ? $request->tahun : date('Y');
        $rincian = [];

        foreach (Anggaran::whereTahun($tahun)->whereHas('detail_norekening', function ($jenis) {
            $jenis->where('jenis_norekening_id', 4);
        })->get() as $item) {
            $pendapatan_anggaran += $item->nilai_anggaran;
        }

        foreach (Anggaran::whereTahun($tahun)->whereHas('detail_norekening', function ($jenis) {
            $jenis->where('jenis_norekening_id', 5);
        })->get() as $item) {
            $belanja_anggaran += $item->nilai_anggaran;
        }

        foreach (Anggaran::whereTahun($tahun)->whereHas('detail_norekening', function ($jenis) {
            $jenis->where('jenis_norekening_id', 6);
        })->get() as $item) {
            $pembiayaan_anggaran += $item->nilai_anggaran;
        }

        foreach (Anggaran::whereTahun($tahun)->get()->groupBy('detail_norekening_id') as $value) {
            $anggaran = 0;
            foreach ($value as $item) {
                $anggaran += $item->nilai_anggaran;
            }
            $rincian[] = $this->cart_rincian($value[0]->detail_norekening->jenis_norekening_id, $anggaran, $value[0]->detail_norekening->nama ? $value[0]->detail_norekening->nama : $value[0]->detail_norekening->kelompok_jenis_norekening->nama);
        }

        return response()->json([
            'pendapatan' => [
                'uang' => 'Rp. ' . substr(number_format($pendapatan_anggaran, 2, ',', '.'), 0, -3),
            ],
            'belanja' => [
                'uang' => 'Rp. ' . substr(number_format($belanja_anggaran, 2, ',', '.'), 0, -3),
            ],
            'pembiayaan' => [
                'uang' => 'Rp. ' . substr(number_format($pembiayaan_anggaran, 2, ',', '.'), 0, -3),
            ],
            'detail' => $rincian
        ]);
    }

    private function cart_rincian($jenis, $anggaran, $rincian)
    {
        return [
            'jenis' => $jenis,
            'rincian' => $rincian,
            'uang' => 'Rp. ' . substr(number_format($anggaran, 2, ',', '.'), 0, -3),
        ];
    }

    public function create()
    {
        $jenis_norekening = Jenis_Norekening::all();
        return view('anggaran.create', compact('jenis_norekening'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tahun' => ['required', 'numeric', 'min:1900'],
            'jenis_norekening' => ['required'],
            'detail_norekening_id' => ['required'],
            'nilai_anggaran' => ['required', 'numeric', 'min:0'],
            'keterangan_lainnya' => ['nullable']
        ], [
            'detail_norekening_id.required' => 'detail jenis anggaran wajib diisi'
        ]);

        $jenis = '';
        if ($request->jenis_norekening == 4) {
            $jenis = 'pendapatan';
        } elseif ($request->jenis_norekening == 5) {
            $jenis = 'belanja';
        } elseif ($request->jenis_norekening == 6) {
            $jenis = 'pembiayaan';
        }

        Anggaran::create($data);
        return redirect('/anggaran?jenis=' . $jenis . "&tahun=" . $request->tahun)->with('success', 'Anggaran APBDes berhasil ditambahkan');
    }

    public function show($id)
    {
        return response()->json(Detail_Norekening::where('jenis_norekening_id', $id)->get());
    }

    public function Kelompok_Norekening(Kelompok_Norekening $Kelompok_Norekening)
    {
        return response()->json($Kelompok_Norekening);
    }

    public function edit(Anggaran $anggaran)
    {
        $jenis_norekening = Jenis_Norekening::all();
        return view('anggaran.edit', compact('anggaran', 'jenis_norekening'));
    }

    public function update(Request $request, Anggaran $anggaran)
    {
        $data = $request->validate([
            'tahun' => ['required', 'numeric', 'min:1900'],
            'jenis_norekening' => ['required'],
            'detail_norekening_id' => ['required'],
            'nilai_anggaran' => ['required', 'numeric', 'min:0'],
            'keterangan_lainnya' => ['nullable']
        ], [
            'detail_norekening_id.required' => 'detail jenis anggaran wajib diisi'
        ]);

        $anggaran->update($data);
        return redirect()->route('anggaran.index')->with('success', 'Anggaran APBDes berhasil diperbarui');
    }

    public function destroy(Anggaran $anggaran)
    {
        $anggaran->delete();
        return redirect()->route('anggaran.index')->with('success', 'Anggaran APBDes berhasil dihapus');
    }
}

        
