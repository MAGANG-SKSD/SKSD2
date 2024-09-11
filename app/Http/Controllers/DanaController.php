<?php

namespace App\Http\Controllers;

use App\Models\Dana;
use Illuminate\Http\Request;

class DanaController extends Controller
{
    public function index()
    {
        // Ambil semua data Dana
        $danas = Dana::with('desa')->get(); // Mengambil data Dana dan relasi Desa

        // Kirim data ke tampilan
        return view('danas.index', compact('danas'));
    }

    // Metode lain seperti create, store, edit, update, destroy, dll.
}
