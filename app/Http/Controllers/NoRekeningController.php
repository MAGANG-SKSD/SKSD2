<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\NoRekeningDataTable;
use App\Models\NoRekening;
use App\Models\Detail_Norekening;
use Illuminate\Support\Facades\Auth;

class NoRekeningController extends Controller
{
    public function index(NoRekeningDataTable $table)
    {
        if (Auth::user()->can('manage-norekening')) {
            // Mengambil semua jenis norekening dari detail_norekening
            $jenisNorekeningList = Detail_Norekening::with('jenis_norekening')
                ->select('jenis_norekening_id')
                ->distinct()
                ->get();

            // Mengambil semua kelompok norekening dari detail_norekening
            $kelompokNorekeningList = Detail_Norekening::with('kelompok_norekening')
                ->select('kelompok_norekening_id')
                ->distinct()
                ->get();

            return $table->render('no_rekenings.index', compact('jenisNorekeningList', 'kelompokNorekeningList'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function filter(Request $request)
    {
        $jenisId = $request->input('jenis_norekening_id');
        $kelompokId = $request->input('kelompok_norekening_id');

        $query = NoRekening::with(['jenis_norekening', 'kelompok_norekening']);

        if ($jenisId) {
            $query->where('jenis_norekening_id', $jenisId);
        }

        if ($kelompokId) {
            $query->where('kelompok_norekening_id', $kelompokId);
        }

        return datatables()->of($query)->toJson();
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
        ]);

        NoRekening::create($request->all());

        return redirect()->route('no_rekenings.index')
            ->with('success', __('No Rekening created successfully.'));
    }

    public function show($id)
    {
        if (Auth::user()->can('show-norekening')) {
            $noRekening = NoRekening::with(['jenis_norekening', 'kelompok_norekening'])->find($id);
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
            'kode_rekening' => 'required|numeric', 
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

    public function getDetailNorekening(Request $request)
    {
        $detail_norekening = Detail_Norekening::where('kelompok_norekening_id', $request->kelompok_id)->get();
        return response()->json($detail_norekening);
    }

    public function getKelompokNorekening(Request $request)
    {
        $jenisNorekeningId = $request->input('jenis_norekening_id');

        // Ambil kelompok norekening berdasarkan jenis norekening
        $kelompokNorekening = Detail_Norekening::where('jenis_norekening_id', $jenisNorekeningId)
            ->with('kelompok_norekening') // Eager load kelompok_norekening
            ->distinct()
            ->get(['kelompok_norekening_id']);

        return response()->json($kelompokNorekening);
    }


}