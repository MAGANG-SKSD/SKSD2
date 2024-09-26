<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;

class ApbdesController extends Controller
{
    // Menampilkan halaman index
    public function index(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        $anggaran = Anggaran::where('tahun', $tahun)->paginate(10);

        return view('apbdes.index', compact('anggaran'));
    }

    // Menampilkan halaman anggaran
    public function showAnggaran()
    {
        return view('apbdes.anggaran');
    }

    // Menampilkan halaman verifikasi
    public function verifikasi()
    {
        $tahun = $request->tahun ?? date('Y');
        $anggaran = Anggaran::where('verifikasi', 0)->paginate(10);
        return view('apbdes.verifikasi', compact('anggaran'));
    }

    // Menampilkan halaman realisasi
    public function showRealisasi()
    {
        return view('apbdes.realisasi');
    }
}

