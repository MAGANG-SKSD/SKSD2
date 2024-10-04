<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;
use App\Models\Detail_Norekening;
use App\Models\Jenis_Norekening;

class APBDesController extends Controller
{
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
    return view('apbdes.index', compact('anggaran', 'tahun_anggaran', 'tahun_dipilih'));;
    }
    public function create()
    {
        // Mengambil semua data jenis norekening dan detail norekening
        $jenis_norekening = Jenis_Norekening::all();
        $detail_norekening = Detail_Norekening::all();

        return view('apbdes.create', compact('jenis_norekening', 'detail_norekening'));
    }

    public function show($id)
    {
        $anggaran = Anggaran::findOrFail($id);
        return view('anggaran.show', compact('anggaran'));
    }

    public function showAnggaran()
    {
        {
            $tahun = $request->tahun ?? date('Y');
            $anggaran = Anggaran::where('anggaran', 0)->paginate(10);
            return view('apbdes.anggaran', compact('anggaran'));
        }
    }

    public function verifikasi(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        $anggaran = Anggaran::where('verifikasi', 0)->paginate(10);
        return view('apbdes.verifikasi', compact('anggaran'));
    }

    // Method for displaying the realization view
    public function realisasi(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        $anggaran = Anggaran::where('tahun', $tahun)->paginate(10);
        return view('apbdes.realisasi', compact('anggaran'));
    }
}
