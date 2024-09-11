<?php

namespace App\Http\Controllers;

use App\Models\Apbdes;
use Illuminate\Http\Request;

class ApbdesController extends Controller
{
    public function index()
    {
        // Ambil semua data APBDes
        $apbdes = Apbdes::with('desa')->get(); // Mengambil data APBDes dan relasi Desa

        // Kirim data ke tampilan
        return view('apbdes.index', compact('apbdes'));
    }

    // Metode lain seperti create, store, edit, update, destroy, dll.
}
