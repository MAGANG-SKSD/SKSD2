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
    // Fungsi untuk toggle verifikasi
    public function toggleVerifikasi($id)
    {
        $anggaran = Anggaran::findOrFail($id);
        $anggaran->verifikasi = !$anggaran->verifikasi; // Toggle verifikasi
        $anggaran->save();

        return response()->json([
            'verifikasi' => $anggaran->verifikasi,
            'message' => 'Verifikasi berhasil diubah!'
        ]);
    }

    // Fungsi untuk toggle status
    public function toggleStatus($id)
    {
        $anggaran = Anggaran::findOrFail($id);
        $anggaran->status = !$anggaran->status; // Toggle status
        $anggaran->save();

        return response()->json([
            'status' => $anggaran->status,
            'message' => 'Status berhasil diubah!'
        ]);
    }

    public function index(Request $request)
{
    if (!$request->tahun || !$request->jenis) {
        return redirect('anggaran?jenis=pendapatan&tahun=' . date('Y'));
    }

    $anggaranQuery = Anggaran::whereTahun($request->tahun);

    if ($request->jenis == "pendapatan") {
        $anggaran = $anggaranQuery->whereHas('detail_norekening', function ($data) {
            $data->where('jenis_norekening_id', 4); // Pendapatan
        })->latest()->paginate(10);
    } elseif ($request->jenis == "belanja") {
        $anggaran = $anggaranQuery->whereHas('detail_norekening', function ($data) {
            $data->where('jenis_norekening_id', 5); // Belanja
        })->latest()->paginate(10);
    } elseif ($request->jenis == "pembiayaan") {
        $anggaran = $anggaranQuery->whereHas('detail_norekening', function ($data) {
            $data->where('jenis_norekening_id', 6); // Pembiayaan
        })->latest()->paginate(10);
    } else {
        return redirect('anggaran?jenis=pendapatan&tahun=' . date('Y'));
    }

    // Pastikan variabel $anggaran dikirimkan ke view
    return view('anggaran.index', compact('anggaran'));
}

    public function cart(Request $request)
    {
        $tahun = $request->tahun ? $request->tahun : date('Y');
        $rincian = [];

        foreach (Anggaran::whereTahun($tahun)->get()->groupBy('detail_norekening_id') as $value) {
            $anggaran = 0;
            foreach ($value as $item) {
                $anggaran += $item->nilai_anggaran;
            }
            $rincian[] = $this->cart_rincian($value[0]->detail_norekening->jenis_norekening_id, $anggaran, $value[0]->detail_norekening->nama ?: $value[0]->detail_norekening->kelompok_jenis_norekening->nama);
        }

        return response()->json(['detail' => $rincian]);
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
        'detail_norekening_id' => ['required', 'exists:detail_norekening,id'], // Menggunakan ID dari detail norekening
        'nilai_anggaran' => ['required', 'numeric', 'min:0'],
        'keterangan_lainnya' => ['nullable']
    ]);

    Anggaran::create($data);
    return redirect('/anggaran?jenis=' . $request->jenis_norekening . "&tahun=" . $request->tahun)
           ->with('success', 'Anggaran APBDes berhasil ditambahkan');
}


    public function show($id)
    {
        return response()->json(Detail_Norekening::where('jenis_norekening_id', $id)->get());
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
        'detail_norekening_id' => ['required', 'exists:detail_norekening,id'],
        'nilai_anggaran' => ['required', 'numeric', 'min:0'],
        'keterangan_lainnya' => ['nullable']
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
