<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggaran;
use App\Models\Detail_Norekening;
use App\Models\Jenis_Norekening;

class AnggaranController extends Controller
{
    // Fungsi untuk menampilkan halaman verifikasi
    public function verifikasi()
    {
        $anggaran = Anggaran::paginate(10);
        return view('apbdes.verifikasi', compact('anggaran'));
    }

    // Fungsi untuk toggle status verifikasi
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

    // Fungsi untuk toggle status realisasi
    public function toggleStatus($id)
    {
        $anggaran = Anggaran::findOrFail($id);
        
        // Tentukan status baru berdasarkan status saat ini
        $newStatus = $anggaran->status === 'DiRealisasikan' ? 'Belum Direalisasi' : 'DiRealisasikan';
        $anggaran->toggleStatus($newStatus); // Panggil metode toggleStatus di model

        return redirect()->route('apbdes.realisasi')->with('success', 'Status realisasi berhasil diubah.');
    }

    // Fungsi untuk menampilkan anggaran berdasarkan tahun dan jenis
    public function index(Request $request)
{
    if (!$request->tahun || !$request->jenis) {
        return redirect('anggaran?jenis=pendapatan&tahun=' . date('Y'));
    }

        // Mengambil data anggaran berdasarkan tahun
        $anggaranQuery = Anggaran::where('tahun', $request->tahun);

        // Menentukan jenis anggaran dan mengambil datanya
        if ($request->jenis == "pendapatan") {
            $anggaran = $anggaranQuery->whereHas('detail_norekening', function ($query) {
                $query->where('jenis_norekening_id', 4); // Pendapatan
            })->latest()->paginate(10);
        } elseif ($request->jenis == "belanja") {
            $anggaran = $anggaranQuery->whereHas('detail_norekening', function ($query) {
                $query->where('jenis_norekening_id', 5); // Belanja
            })->latest()->paginate(10);
        } elseif ($request->jenis == "pembiayaan") {
            $anggaran = $anggaranQuery->whereHas('detail_norekening', function ($query) {
                $query->where('jenis_norekening_id', 6); // Pembiayaan
            })->latest()->paginate(10);
        } else {
            return redirect('anggaran?jenis=pendapatan&tahun=' . date('Y'));
        }

        // Mengembalikan tampilan dengan data anggaran
        return view('apbdes.anggaran', compact('anggaran'));
    }


    // Fungsi untuk mengelola rincian anggaran
    // Fungsi untuk mengelola rincian anggaran
    public function cart(Request $request)
    {
        $tahun = $request->tahun ? $request->tahun : date('Y');
        $rincian = [];

        // Mengelompokkan anggaran berdasarkan detail_norekening_id
        foreach (Anggaran::where('tahun', $tahun)->get()->groupBy('detail_norekening_id') as $value) {
            $anggaran = 0;
            foreach ($value as $item) {
                $anggaran += $item->nilai_anggaran;
            }
            // Memanggil fungsi cart_rincian untuk menyusun rincian
            $rincian[] = $this->cart_rincian($value[0]->detail_norekening->jenis_norekening_id, $anggaran, $value[0]->detail_norekening->nama ?: $value[0]->detail_norekening->kelompok_jenis_norekening->nama);
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

    // Fungsi untuk membuat anggaran baru
    public function create()
    {
        $jenis_norekening = Jenis_Norekening::all(); // Ambil semua jenis norekening
        return view('apbdes.create', compact('jenis_norekening')); // Pindahkan ke view apbdes.create
    }

    // Fungsi untuk menyimpan anggaran baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'tahun' => ['required', 'numeric', 'min:1900'],
            'detail_norekening_id' => ['required', 'exists:detail_norekening,id'],
            'nilai_anggaran' => ['required', 'numeric', 'min:0'],
            'keterangan_lainnya' => ['nullable']
        ]);

        // Menambahkan nilai_realisasi yang awalnya sama dengan nilai_anggaran
        $data['nilai_realisasi'] = $data['nilai_anggaran'];

        Anggaran::create($data);
        return redirect('/anggaran?jenis=' . $request->jenis_norekening . "&tahun=" . $request->tahun)
               ->with('success', 'Anggaran APBDes berhasil ditambahkan');
    }

    public function getKelompokNorekening($Id)
{
    // Memastikan $jenisId diterima
    if (!$Id) {
        return response()->json(['message' => 'ID Jenis No Rekening tidak ditemukan'], 400);
    }

    // Mengambil data kelompok berdasarkan jenis no rekening
    $kelompokNorekening = Kelompok_Norekening::where('jenis_norekening_id', $Id)->get();

    // Jika data kosong
    if ($kelompokNorekening->isEmpty()) {
        return response()->json(['message' => 'Data kelompok no rekening tidak ditemukan'], 404);
    }

    // Kembalikan data dalam bentuk JSON
    return response()->json($kelompokNorekening);
}

    // Fungsi untuk menampilkan detail anggaran berdasarkan id
    public function show($id)
    {
        return response()->json(Detail_Norekening::where('kelompok_norekening_id', $kelompokId)->get());
    }

    // Fungsi untuk mengedit anggaran
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

    // Menampilkan halaman realisasi
    public function realisasi()
    {
        // Mengambil hanya data anggaran yang sudah diverifikasi
        $anggaran = Anggaran::where('verifikasi', true)->paginate(10); 

        return view('apbdes.realisasi', compact('anggaran'));
    }

    // Mengupdate realisasi anggaran
    public function updateRealisasi(Request $request, $id)
    {
        $request->validate([
            'nilai_realisasi' => 'required|numeric', 
        ]);

        $anggaran = Anggaran::findOrFail($id);
        $anggaran->nilai_realisasi = $request->input('nilai_realisasi'); 
        $anggaran->status = 'realisasi'; // Atur status
        $anggaran->save();

        return redirect()->route('apbdes.realisasi')->with('success', 'Realisasi berhasil diperbarui!');
    }
}
