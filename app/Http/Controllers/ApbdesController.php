<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApbdesController extends Controller
{
    // Menampilkan halaman index
    public function index()
    {
        // Hanya menampilkan view tanpa pengambilan data dari database
        return view('apbdes.index'); // Pastikan view ini sudah ada
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
