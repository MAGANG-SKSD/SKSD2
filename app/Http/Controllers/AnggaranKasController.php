<?php

namespace App\Http\Controllers;

use App\DataTables\AnggaranKasDataTable;
use App\Models\AnggaranKas;
use Illuminate\Http\Request;

class AnggaranKasController extends Controller
{
    public function index(AnggaranKasDataTable $dataTable)
    {
        return $dataTable->render('anggaran-kas.index');
    }

    public function create()
    {
        return view('anggaran-kas.create');
    }

    public function store(Request $request)
    {
        // Simpan data
    }

    public function edit($id)
    {
        $anggaranKas = AnggaranKas::find($id);
        return view('anggaran-kas.edit', compact('anggaranKas'));
    }

    public function update(Request $request, $id)
    {
        // Update data
    }

    public function destroy($id)
    {
        // Hapus data
    }
}
