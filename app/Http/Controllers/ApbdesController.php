<?php

namespace App\Http\Controllers;

use App\Models\APBDes;
use App\DataTables\APBDesDataTable;
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
        $apbdes = APBDes::findOrFail($id);
        // Logika untuk menampilkan rincian anggaran
        return view('apbdes.anggaran', compact('apbdes'));
    }

    public function verifikasi($id)
    {
        $apbdes = APBDes::findOrFail($id);
        $apbdes->status_persetujuan = 'verified';
        $apbdes->save();
        
        return redirect()->route('apbdes.index')->with('success', 'Anggaran telah diverifikasi.');
    }

    public function realisasi($id)
    {
        $apbdes = APBDes::findOrFail($id);
        // Logika untuk menampilkan rincian realisasi
        return view('apbdes.realisasi', compact('apbdes'));
    }
}
