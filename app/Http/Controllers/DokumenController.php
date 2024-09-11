<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        // Ambil semua data Dokumen
        $dokumens = Dokumen::all();

        // Kirim data ke tampilan
        return view('dokumens.index', compact('dokumens'));
    }

    // Metode lain seperti create, store, edit, update, destroy, dll.
}
