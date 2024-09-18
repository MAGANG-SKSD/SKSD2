<?php

namespace App\Http\Controllers;

use App\DataTables\RealisasiAnggaranDataTable;
use App\Models\RealisasiAnggaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RealisasiAnggaranController extends Controller
{
    public function index(RealisasiAnggaranDataTable $table)
    {
        if (\Auth::user()->can('manage-reaalisasianggaran')) {
            return $table->render('realisasi_anggarans.index');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function create()
    {
        if (\Auth::user()->can('create-realisasianggaran')) {
            return view('realisasi_anggarans.create');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'desa_id' => 'required',
            'tahun' => 'required',
            'belanja_realisasi' => 'required',
            'dana_tidak_terpakai' => 'required',
            'laporan' => 'required',
        ]);

        RealisasiAnggaran::create([
            'desa_id' => $request['desa_id'],
            'tahun' => $request['tahun'],
            'belanja_realisasi' => $request['belanja_realisasi'],
            'dana_tidak_terpakai' => $request['dana_tidak_terpakai'],
            'laporan' => $request['laporan'],
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('realisasi_anggarans.index')
            ->with('success', __('Realisasi created successfully'));
    }

    public function show($id)
    {
        if (\Auth::user()->can('show-realisasianggaran')) {
            $realisasi = RealisasiAnggaran::find($id);
            return view('realisasi_anggarans.show', compact('realisasi'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function edit($id)
    {
        if (\Auth::user()->can('edit-realisasianggaran')) {
            $realisasi = RealisasiAnggaran::find($id);
            return view('realisasi_anggarans.edit', compact('realisasi'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
}


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'desa_id' => 'required',
            'tahun' => 'required',
            'belanja_realisasi' => 'required',
            'dana_tidak_terpakai' => 'required',
            'laporan' => 'required',
        ]);

        $realisasi = RealisasiAnggaran::find($id);
        $realisasi->update($request->all());

        return redirect()->route('realisasi_anggarans.index')
            ->with('message', __('Realisasi updated successfully'));
    }

    public function destroy($id)
    {
        if (\Auth::user()->can('delete-realisasianggaran')) {
            if ($id == 1) {
                return redirect()->back()->with('error', 'Permission denied.');
            } else {
                RealisasiAnggaran::destroy($id);
                return redirect()->route('realisasi_anggarans.index')->with('success', __('Realisasi deleted successfully.'));
            }
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    // Metode lain seperti create, store, edit, update, destroy, dll.
}
