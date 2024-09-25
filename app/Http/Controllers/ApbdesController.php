<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;

class ApbdesController extends Controller
{
    // Menampilkan halaman index
    public function index()
    {
        // Mengambil semua data anggaran
        $anggarans = Anggaran::all();

        // Menampilkan view dengan data anggaran
        return view('apbdes.index', compact('anggarans'));
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
