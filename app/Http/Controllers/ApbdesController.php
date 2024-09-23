<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APBDesController extends Controller
{
    public function index(APBDesDataTable $dataTable)
    {
        return $dataTable->render('apbdes.index');
    }

    public function show($id)
    {
        $apbdes = APBDes::findOrFail($id);
        return view('apbdes.show', compact('apbdes'));
    }

    public function anggaran($id)
    {
        if (\Auth::user()->can('edit-apbdes')) {
            $apbdes = Apbdes::find($id);
            return view('apbdes.edit', compact('apbdes')); // Perbaikan nama variabel compact
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    // Menampilkan halaman realisasi
    public function showRealisasi()
    {
        return view('apbdes.realisasi'); // Pastikan view ini ada
    }
}
