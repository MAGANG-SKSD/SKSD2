<?php

namespace App\Http\Controllers;

use App\Models\Apbdes; // Pastikan model yang digunakan benar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApbdesController extends Controller
{
    // Menampilkan halaman index
    public function index()
    {
        if (\Auth::user()->can('manage-apbdes')) {
            $apbdes = Apbdes::all(); // Mengambil semua data APBDes
            return view('apbdes.index', compact('apbdes')); // Menampilkan view index
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    // Menampilkan halaman create
    public function create()
    {
        if (\Auth::user()->can('create-apbdes')) {
            return view('apbdes.create');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    // Menyimpan data APBDes baru
    public function store(Request $request)
    {
        $this->validate($request, [
            'desa_id' => 'required|integer',
            'tahun' => 'required|integer',
            'pendapatan' => 'required|numeric',
            'belanja' => 'required|numeric',
            'pembiayaan' => 'required|numeric',
            'status_verifikasi' => 'required|string',
        ]);

        Apbdes::create([
            'desa_id' => $request['desa_id'],
            'tahun' => $request['tahun'],
            'pendapatan' => $request['pendapatan'],
            'belanja' => $request['belanja'],
            'pembiayaan' => $request['pembiayaan'],
            'status_verifikasi' => $request['status_verifikasi'],
            'id_detail_no_rekening' => $request['id_detail_no_rekening'],
            'created_by' => Auth::user()->id, // Menyimpan siapa yang membuat data ini
        ]);

        return redirect()->route('apbdes.index')->with('success', __('APBDes created successfully.'));
    }

    // Menampilkan detail APBDes
    public function show($id)
    {
        if (\Auth::user()->can('show-apbdes')) {
            $apbdes = Apbdes::find($id);
            return view('apbdes.show', compact('apbdes')); // Perbaikan nama variabel compact
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    // Menampilkan halaman edit APBDes
    public function edit($id)
    {
        if (\Auth::user()->can('edit-apbdes')) {
            $apbdes = Apbdes::find($id);
            return view('apbdes.edit', compact('apbdes')); // Perbaikan nama variabel compact
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    // Mengupdate data APBDes
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'desa_id' => 'required|integer',
            'tahun' => 'required|integer',
            'pendapatan' => 'required|numeric',
            'belanja' => 'required|numeric',
            'pembiayaan' => 'required|numeric',
            'status_verifikasi' => 'required|string',
        ]);

        $apbdes = Apbdes::find($id);
        $apbdes->update([
            'desa_id' => $request['desa_id'],
            'tahun' => $request['tahun'],
            'pendapatan' => $request['pendapatan'],
            'belanja' => $request['belanja'],
            'pembiayaan' => $request['pembiayaan'],
            'status_verifikasi' => $request['status_verifikasi'],
            'id_detail_no_rekening' => $request['id_detail_no_rekening'],
        ]);

        return redirect()->route('apbdes.index')->with('success', __('APBDes updated successfully.'));
    }

    // Menghapus data APBDes
    public function destroy($id)
    {
        if (\Auth::user()->can('delete-apbdes')) {
            Apbdes::destroy($id); // Menghapus data APBDes sesuai ID
            return redirect()->route('apbdes.index')->with('success', __('APBDes deleted successfully.'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }
}
