<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggaran;
use App\Models\Detail_Norekening;
use App\Models\Jenis_Norekening;
use App\Models\Kelompok_Norekening;

class AnggaranController extends Controller
{
    // Fungsi untuk toggle verifikasi
    public function toggleVerifikasi($id)
    {
        $anggaran = Anggaran::findOrFail($id);
        $anggaran->toggleVerifikasi(); // Panggil fungsi toggle dari model
        return response()->json([
            'verifikasi' => $anggaran->verifikasi,
            'message' => 'Verifikasi berhasil diubah!'
        ]);
    }

    // Fungsi untuk toggle status
    public function toggleStatus($id)
    {
        $anggaran = Anggaran::findOrFail($id);
        $anggaran->toggleStatus(); // Panggil fungsi toggle dari model
        return response()->json([
            'status' => $anggaran->status,
            'message' => 'Status berhasil diubah!'
        ]);
    }

    // Menampilkan daftar anggaran berdasarkan tahun dan jenis
    public function index(Request $request)
    {
        if (!$request->tahun || !$request->jenis) {
            return redirect('anggaran?jenis=pendapatan&tahun=' . date('Y'));
        }

        $anggaranQuery = Anggaran::whereTahun($request->tahun);

        switch ($request->jenis) {
            case 'pendapatan':
                $anggaran = $anggaranQuery->whereHas('detail_norekening', function ($data) {
                    $data->where('jenis_norekening_id', 4); // Pendapatan
                })->latest()->paginate(10);
                break;
            case 'belanja':
                $anggaran = $anggaranQuery->whereHas('detail_norekening', function ($data) {
                    $data->where('jenis_norekening_id', 5); // Belanja
                })->latest()->paginate(10);
                break;
            case 'pembiayaan':
                $anggaran = $anggaranQuery->whereHas('detail_norekening', function ($data) {
                    $data->where('jenis_norekening_id', 6); // Pembiayaan
                })->latest()->paginate(10);
                break;
            default:
                return redirect('anggaran?jenis=pendapatan&tahun=' . date('Y'));
        }

        return view('anggaran.index', compact('anggaran'));
    }

    // Fungsi untuk menampilkan rincian anggaran dalam bentuk cart
    public function cart(Request $request)
    {
        $tahun = $request->tahun ? $request->tahun : date('Y');
        $rincian = [];

        foreach (Anggaran::whereTahun($tahun)->get()->groupBy('detail_norekening_id') as $value) {
            $totalAnggaran = $value->sum('nilai_anggaran');
            $rincian[] = $this->cart_rincian(
                $value[0]->detail_norekening->jenis_norekening_id, 
                $totalAnggaran, 
                $value[0]->detail_norekening->nama ?: $value[0]->detail_norekening->kelompok_jenis_norekening->nama
            );
        }

        return response()->json(['detail' => $rincian]);
    }

    // Membuat rincian untuk ditampilkan di cart
    private function cart_rincian($jenis, $anggaran, $rincian)
    {
        return [
            'jenis' => $jenis,
            'rincian' => $rincian,
            'uang' => 'Rp. ' . number_format($anggaran, 0, ',', '.'),
        ];
    }

    // Menampilkan form untuk membuat anggaran baru
    public function create()
    {
        $jenis_norekening = Jenis_Norekening::all(); // Ambil semua jenis norekening
        return view('apbdes.create', compact('jenis_norekening')); // Pindahkan ke view apbdes.create
    }

    // Menyimpan data anggaran baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'tahun' => ['required', 'numeric', 'min:1900'],
            'detail_norekening_id' => ['required', 'exists:detail_norekening,id'],
            'nilai_anggaran' => ['required', 'numeric', 'min:0'],
            'keterangan_lainnya' => ['nullable']
        ]);

        Anggaran::create($data);
        return redirect('/apbdes/anggaran?jenis=' . $request->jenis_norekening . "&tahun=" . $request->tahun)
               ->with('success', 'Anggaran APBDes berhasil ditambahkan');
    }

    public function getKelompokNorekening($Id)
{
    // Mengambil kelompok no rekening berdasarkan jenis no rekening
    $kelompokNorekening = Kelompok_Norekening::where('jenis_norekening_id', $Id)->get();

    // Memastikan data berhasil diambil
    if ($kelompokNorekening->isEmpty()) {
        return response()->json(['message' => 'Tidak ada kelompok norekening ditemukan'], 404);
    }

    return response()->json($kelompokNorekening);
}


    // Mengambil detail berdasarkan kelompok no rekening
    public function getDetailNorekening($kelompokId)
    {
        return response()->json(Detail_Norekening::where('kelompok_norekening_id', $kelompokId)->get());
    }

    // Menampilkan form edit anggaran
    public function edit(Anggaran $anggaran)
    {
        $jenis_norekening = Jenis_Norekening::all();
        return view('anggaran.edit', compact('anggaran', 'jenis_norekening'));
    }

    // Memperbarui anggaran
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

    // Menghapus anggaran
    public function destroy(Anggaran $anggaran)
    {
        $anggaran->delete();
        return redirect()->route('anggaran.index')->with('success', 'Anggaran APBDes berhasil dihapus');
    }
}
