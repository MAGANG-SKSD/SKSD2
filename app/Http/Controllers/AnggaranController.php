<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggaran;
use App\Models\Detail_Norekening;
use App\Models\Jenis_Norekening;
use App\Models\Kelompok_Norekening;

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
        $keterangan = 'Disetujui'; // Misalnya, bisa diubah sesuai kebutuhan
        $anggaran->toggleVerifikasi($keterangan);
        return redirect()->route('apbdes.verifikasi')->with('success', 'Status verifikasi berhasil diubah.');
    }

    // Fungsi untuk menampilkan status realisasi
    public function status()
    {
        $anggaran = Anggaran::paginate(10);
        return view('apbdes.realisasi', compact('anggaran'));
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
        // Mengambil tahun dan jenis dari request, jika tidak ada, atur default
        $tahun = $request->tahun ?? date('Y');
        $jenis = $request->jenis ?? 'pendapatan'; // Default jenis jika tidak ada
    
        // Ambil data anggaran berdasarkan tahun
        $anggaran = Anggaran::where('tahun', $tahun)->paginate(10);
    
        // Jika Anda ingin memfilter berdasarkan jenis
        if ($jenis === 'pendapatan') {
            // Logika untuk mengambil data pendapatan
        } elseif ($jenis === 'belanja') {
            // Logika untuk mengambil data belanja
        } elseif ($jenis === 'pembiayaan') {
            // Logika untuk mengambil data pembiayaan
        }
    
        // Kembalikan tampilan dengan data anggaran
        return view('apbdes.index', compact('anggaran'));
    }

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

    private function cart_rincian($jenis, $anggaran, $rincian)
    {
        return [
            'jenis' => $jenis,
            'rincian' => $rincian,
            'uang' => 'Rp. ' . substr(number_format($anggaran, 2, ',', '.'), 0, -3),
        ];
    }

    // Fungsi untuk membuat anggaran baru
    public function create()
    {
        // Mengambil semua data jenis norekening dan detail norekening
        $jenis_norekening = Jenis_Norekening::all();
        $detail_norekening = Detail_Norekening::all();

        return view('apbdes.create', compact('jenis_norekening', 'detail_norekening'));
    }

    // Method untuk mengambil detail norekening berdasarkan jenis norekening
    public function getDetailNorekening(Request $request)
    {
        $detail_norekening = Detail_Norekening::where('jenis_norekening_id', $request->jenis_id)->get();
        return response()->json($detail_norekening);
    }

    // Menyimpan data anggaran
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'detail_norekening_id' => 'required|exists:detail_norekening,id',
            'keterangan_lainnya' => 'nullable|string',
            'nilai_anggaran' => 'required|numeric',
        ]);

        // Membuat data anggaran baru
        Anggaran::create([
            'tahun' => $request->tahun,
            'detail_norekening_id' => $request->detail_norekening_id,
            'keterangan_lainnya' => $request->keterangan_lainnya,
            'nilai_anggaran' => $request->nilai_anggaran,
            // Tambahkan kolom lain sesuai kebutuhan
        ]);

        return redirect()->route('apbdes.index')->with('success', 'Anggaran berhasil dibuat.');
    }

    // Fungsi untuk menampilkan detail anggaran berdasarkan id
    public function show($id)
    {
        return response()->json(Detail_Norekening::where('jenis_norekening_id', $id)->get());
    }

    // Fungsi untuk mengedit anggaran
    public function edit(Anggaran $anggaran)
    {
        $detailNorekening = Detail_Norekening::with(['jenis_norekening', 'jenis_norekening.kelompok_norekening'])->get();
        return view('apbdes.edit', compact('anggaran', 'detailNorekening'));
    }

    // Fungsi untuk memperbarui anggaran
    public function update(Request $request, Anggaran $anggaran)
    {
        $data = $request->validate([
            'tahun' => ['required', 'numeric', 'min:1900'],
            'detail_norekening_id' => ['required', 'exists:detail_norekening,id'], // Validasi untuk detail_norekening
            'nilai_anggaran' => ['required', 'numeric', 'min:0'],
            'keterangan_lainnya' => ['nullable']
        ]);

        // Update nilai anggaran dan detail_norekening
        $anggaran->update($data);

        return redirect()->route('apbdes.index')->with('success', 'Anggaran APBDes berhasil diperbarui.');
    }

    // Fungsi untuk menghapus anggaran
    public function destroy(Anggaran $anggaran)
    {
        $anggaran->delete();
        return redirect()->route('anggaran.index')->with('success', 'Anggaran APBDes berhasil dihapus.');
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
