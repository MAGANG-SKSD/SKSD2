<?php

namespace App\Http\Controllers;

use App\Models\Sp2d;
use Illuminate\Http\Request;

class Sp2dController extends Controller
{
    public function index()
    {
        // Ambil semua data Sp2d
        $sp2ds = Sp2d::all();

        // Kirim data ke tampilan
        return view('sp2ds.index', compact('sp2ds'));
    }

    // Metode lain seperti create, store, edit, update, destroy, dll.
}
