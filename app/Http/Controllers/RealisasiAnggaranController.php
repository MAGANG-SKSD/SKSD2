<?php

namespace App\Http\Controllers;

use App\Models\RealisasiAnggaran;
use Illuminate\Http\Request;

class RealisasiAnggaranController extends Controller
{
    public function index()
    {
        // Ambil semua data RealisasiAnggaran
        $realisasiAnggarans = RealisasiAnggaran::all();

        // Kirim data ke tampilan
        return view('realisasi_anggarans.index', compact('realisasiAnggarans'));
    }

    // Metode lain seperti create, store, edit, update, destroy, dll.
}
