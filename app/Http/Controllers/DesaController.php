<?php

namespace App\Http\Controllers;

use App\DataTables\DesaDataTable; // Pastikan Anda memiliki data table untuk model Desa
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;
use App\Http\Controllers\Controller;

class DesaController extends Controller
{
    public function index(DesaDataTable $table)
    {
        if (\Auth::user()->can('manage-desa')) {
            $desa = Desa::all(); // Ambil semua data desa
            return $table->render('desas.index', compact('desas'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function create()
    {
        if (\Auth::user()->can('create-desa')) {
            return view('desas.create');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_desa' => 'required',
            'alamat_desa' => 'required',
            'kode_pos' => 'required',
            'telepon' => 'required',
            'email' => 'required|email|unique:desas,email',
        ]);

        $desa = Desa::create([
            'nama_desa' => $request->input('nama_desa'),
            'alamat_desa' => $request->input('alamat_desa'),
            'kode_pos' => $request->input('kode_pos'),
            'telepon' => $request->input('telepon'),
            'email' => $request->input('email'),
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('desas.index')
            ->with('success', __('Desa created successfully.'));
    }

    public function show($desa_id)
{
    if (\Auth::user()->can('show-desa')) {
        $desa = Desa::find($desa_id);
        return view('desas.show', compact('desa')); // Pastikan ini
    } else {
        return redirect()->back()->with('error', 'Permission denied.');
    }
}


    public function edit($desa_id)
    {
        if (\Auth::user()->can('edit-desa')) {
            $desa = Desa::find($desa_id);
            return view('desas.edit', compact('desa'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function update(Request $request, $desa_id)
    {
        $this->validate($request, [
            'nama_desa' => 'required',
            'alamat_desa' => 'required',
            'kode_pos' => 'required',
            'telepon' => 'required',
            'email' => 'required|email|unique:desas,email,' . $desa_id, ',desa_id',
        ]);

        $input = $request->all();

        $desa = Desa::find($desa_id);
        $desa->update($input);

        return redirect()->route('desas.index')
            ->with('success', __('Desa updated successfully.'));
    }

    public function destroy($desa_id)
    {
        if (\Auth::user()->can('delete-desa')) {
            if ($desa_id == 1) {
                return redirect()->back()->with('error', 'Permission denied.');
            } else {
                Desa::destroy($desa_id);
                return redirect()->route('desas.index')->with('success', __('Desa deleted successfully.'));
            }
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function profile($desa_id)
    {
        $desa = Desa::where('desa_id', $desa_id)->firstOrFail(); // Jika tidak ditemukan, akan menampilkan 404 error

        return view('desas.profile', compact('desa'));
    }





}
