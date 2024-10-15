<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\NoRekeningDataTable;
use App\Models\NoRekening; // Pastikan Anda menggunakan model NoRekening
use Illuminate\Support\Facades\Auth;

class NoRekeningController extends Controller
{
    public function index(NoRekeningDataTable $table)
    {
        if (Auth::user()->can('manage-norekening')) {
            return $table->render('no_rekenings.index');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function create()
    {
        if (Auth::user()->can('create-norekening')) {
            return view('no_rekenings.create');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            // Validasi kolom lain jika perlu
        ]);

        NoRekening::create($request->all());

        return redirect()->route('no_rekenings.index')
            ->with('success', __('No Rekening created successfully.'));
    }

    public function show($id)
    {
        if (Auth::user()->can('show-norekening')) {
            $noRekening = NoRekening::find($id);
            if (!$noRekening) {
                return redirect()->route('no_rekenings.index')->with('error', 'No Rekening not found.');
            }

            return view('no_rekenings.show', compact('noRekening'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->can('edit-norekening')) {
            $noRekening = NoRekening::find($id);
            if (!$noRekening) {
                return redirect()->route('no_rekenings.index')->with('error', 'No Rekening not found.');
            }

            return view('no_rekenings.edit', compact('noRekening'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_rekening' => 'required|numeric', // Sesuaikan dengan validasi yang Anda perlukan
            'uraian' => 'required|string',
        ]);

        $noRekening = NoRekening::findOrFail($id);
        $noRekening->update($request->all());

        return redirect()->route('no_rekenings.index')
            ->with('success', __('No Rekening updated successfully.'));
    }

    public function destroy($id)
    {
        if (Auth::user()->can('delete-norekening')) {
            $noRekening = NoRekening::find($id);
            if ($noRekening) {
                $noRekening->delete();
                return redirect()->route('no_rekenings.index')
                    ->with('success', __('No Rekening deleted successfully.'));
            } else {
                return redirect()->route('no_rekenings.index')->with('error', 'No Rekening not found.');
            }
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }
}
