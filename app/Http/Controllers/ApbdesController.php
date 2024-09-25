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
    $anggaran = Anggaran::where('tahun', $tahun)->paginate(10); // Sesuaikan query

    return view('apbdes.index', compact('anggaran'));
}

    // Menampilkan halaman anggaran
    public function showAnggaran()
    {
        return view('apbdes.anggaran'); // Pastikan view ini ada
    }

    // Menampilkan halaman verifikasi
    public function showVerifikasi()
    {
        return view('apbdes.verifikasi'); // Pastikan view ini ada
    }

    // Menampilkan halaman realisasi
    public function showRealisasi()
    {
        return view('apbdes.realisasi'); // Pastikan view ini ada
    }
}
