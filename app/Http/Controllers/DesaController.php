<?php

namespace App\Http\Controllers;

use App\DataTables\DesaDataTable; // Pastikan Anda memiliki data table untuk model Desa
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;

class DesaController extends Controller
{
    public function index(DesaDataTable $table)
    {
        if (\Auth::user()->can('manage-desa')) {
            return $table->render('desas.index');
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

    public function show($id)
    {
        if (\Auth::user()->can('show-desa')) {
            $desa = Desa::find($id);
            return view('desas.show', compact('desa'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function edit($id)
    {
        if (\Auth::user()->can('edit-desa')) {
            $desa = Desa::find($id);
            return view('desas.edit', compact('desa'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_desa' => 'required',
            'alamat_desa' => 'required',
            'kode_pos' => 'required',
            'telepon' => 'required',
            'email' => 'required|email|unique:desas,email,' . $id,
        ]);

        $input = $request->all();

        $desa = Desa::find($id);
        $desa->update($input);

        return redirect()->route('desas.index')
            ->with('success', __('Desa updated successfully.'));
    }

    public function destroy($id)
    {
        if (\Auth::user()->can('delete-desa')) {
            if ($id == 1) {
                return redirect()->back()->with('error', 'Permission denied.');
            } else {
                Desa::destroy($id);
                return redirect()->route('desas.index')->with('success', __('Desa deleted successfully.'));
            }
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }
}
