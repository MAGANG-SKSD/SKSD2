<?php

namespace App\Http\Controllers;

use App\DataTables\ApbdesDataTable;
use Illuminate\Http\Request;
use App\Models\Apbdes;
use App\Models\Desa;  // Pastikan Model Desa tersedia

class ApbdesController extends Controller
{
    // Method untuk menampilkan list APBDes
    public function index(ApbdesDataTable $table)
    {
        return $table->render('apbdes.index');
    }

    // Method untuk menampilkan form create APBDes
    public function create()
    {
        // Mengambil data desa untuk dropdown
        $desas = Desa::all();  // Pastikan model Desa sudah ada
        return view('apbdes.create', compact('desas'));
    }

    // Method untuk menyimpan data APBDes
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'desa_id' => 'required|integer|exists:desas,id',
                'tahun' => 'required|integer',
                'pendapatan' => 'required|numeric',
                'belanja' => 'required|numeric',
                'pembiayaan' => 'required|numeric',
                'status_verifikasi' => 'nullable|string',
                'id_detail_no_rekening' => 'nullable|integer',
            ]
        );

        // Menyimpan data APBDes
        $apbdes = new Apbdes();
        $apbdes->desa_id = $request->desa_id;
        $apbdes->tahun = $request->tahun;
        $apbdes->pendapatan = $request->pendapatan;
        $apbdes->belanja = $request->belanja;
        $apbdes->pembiayaan = $request->pembiayaan;
        $apbdes->status_verifikasi = $request->status_verifikasi;
        $apbdes->id_detail_no_rekening = $request->id_detail_no_rekening;
        $apbdes->save();

        return redirect()->route('apbdes.index')->with('message', 'APBDes added successfully!');
    }

    // Method untuk menampilkan form edit APBDes
    public function edit(Apbdes $apbdes)
    {
        // Mengambil data desa untuk dropdown
        $desas = Desa::all();
        return view('apbdes.edit', compact('apbdes', 'desas'));
    }

    // Method untuk mengupdate data APBDes
    public function update(Request $request, Apbdes $apbdes)
    {
        $this->validate(
            $request,
            [
                'desa_id' => 'required|integer|exists:desas,id',
                'tahun' => 'required|integer',
                'pendapatan' => 'required|numeric',
                'belanja' => 'required|numeric',
                'pembiayaan' => 'required|numeric',
                'status_verifikasi' => 'nullable|string',
                'id_detail_no_rekening' => 'nullable|integer',
            ]
        );

        // Mengupdate data APBDes
        $apbdes->update($request->all());

        return redirect()->route('apbdes.index')->with('success', 'APBDes updated successfully!');
    }

    // Method untuk menghapus data APBDes
    public function destroy($id)
    {
        $apbdes = Apbdes::findOrFail($id);
        $apbdes->delete();
        return redirect()->route('apbdes.index')->with('success', 'APBDes deleted successfully!');
    }
}
