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
        // Mengambil daftar tahun anggaran yang tersedia (distinct)
    $tahun_anggaran = Anggaran::select('tahun')->distinct()->pluck('tahun');

    // Mendapatkan anggaran sesuai dengan tahun yang dipilih, atau tampilkan semua jika tidak ada tahun yang dipilih
    $tahun_dipilih = $request->tahun ?? 'semua';
    
    if ($tahun_dipilih !== 'semua') {
        $anggaran = Anggaran::where('tahun', $tahun_dipilih)->paginate(10);
    } else {
        $anggaran = Anggaran::paginate(10); // Menampilkan semua anggaran tanpa filter tahun
    }

    // Mengirimkan data anggaran dan tahun anggaran ke view
    return view('apbdes.anggaran', compact('anggaran', 'tahun_anggaran', 'tahun_dipilih'));;
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

    public function updateNilai(Request $request, $id)
    {
        $anggaran = Anggaran::findOrFail($id);
        $anggaran->nilai_anggaran = $request->input('nilai_anggaran');
        $anggaran->save();

        return redirect()->route('apbdes.index')->with('success', 'Nilai anggaran berhasil diperbarui.');
    }


    // Fungsi untuk menampilkan detail anggaran berdasarkan id
    public function show($id)
    {
        return response()->json(Detail_Norekening::where('jenis_norekening_id', $id)->get());
    }

    // Fungsi untuk mengedit anggaran
    public function edit($id)
    
    {
        // Ambil data anggaran berdasarkan ID
        $anggaran = Anggaran::findOrFail($id);

        // Ambil data yang dibutuhkan seperti jenis norekening dan detail norekening
        $jenis_norekening = Jenis_Norekening::all();
        $detail_norekening = Detail_Norekening::where('jenis_norekening_id', $anggaran->detail_norekening->jenis_norekening_id)->get();

        // Arahkan ke view 'edit' dengan data yang diperlukan
        return view('apbdes.edit', compact('anggaran', 'jenis_norekening', 'detail_norekening'));
    }


    // Fungsi untuk memperbarui anggaran
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'jenis_norekening_id' => 'required|integer',
            'detail_norekening_id' => 'required|integer',
            'nilai_anggaran' => 'required|numeric',
        ]);
    
        // Cari anggaran berdasarkan ID
        $anggaran = Anggaran::findOrFail($id);
    
        // Update data anggaran
        $anggaran->update([
            'tahun' => $request->tahun,
            'detail_norekening_id' => $request->detail_norekening_id,
            'keterangan_lainnya' => $request->keterangan_lainnya,
            'nilai_anggaran' => $request->nilai_anggaran,
        ]);
    
        return redirect()->route('apbdes.index')->with('success', 'Anggaran berhasil diupdate');
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