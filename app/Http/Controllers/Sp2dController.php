<?php

namespace App\Http\Controllers;

use App\DataTables\Sp2dsDataTable; // Ganti dengan data table yang sesuai
use App\Models\Sp2d; // Ganti dengan model yang sesuai
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Sp2dController extends AppBaseController
{
    public function index(Sp2dsDataTable $table)
    {
        // Ambil semua data Sp2d
        $sp2ds = Sp2d::all();

        // Kirim data ke tampilan
        return view('sp2ds.index', compact('sp2ds'));
    }

    // Metode lain seperti create, store, edit, update, destroy, dll.
}
