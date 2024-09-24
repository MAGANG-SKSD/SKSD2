<?php

namespace App\Http\Controllers;

use App\Models\NoRekening;
use Illuminate\Http\Request;

class NoRekeningsController extends Controller
{
    public function index()
    {
        $noRekenings = NoRekening::all();
        return view('no_rekenings.index', compact('noRekenings'));
    }

    public function create()
    {
        return view('no_rekenings.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        NoRekening::create($input);

        return redirect(route('noRekenings.index'));
    }

    public function show($id)
    {
        $noRekening = NoRekening::find($id);

        if (empty($noRekening)) {
            return redirect(route('noRekenings.index'));
        }

        return view('no_rekenings.show', compact('noRekening'));
    }

    public function edit($id)
    {
        $noRekening = NoRekening::find($id);

        if (empty($noRekening)) {
            return redirect(route('noRekenings.index'));
        }

        return view('no_rekenings.edit', compact('noRekening'));
    }

    public function update(Request $request, $id)
    {
        $noRekening = NoRekening::find($id);
        $noRekening->update($request->all());

        return redirect(route('noRekenings.index'));
    }

    public function destroy($id)
    {
        $noRekening = NoRekening::find($id);
        $noRekening->delete();

        return redirect(route('noRekenings.index'));
    }
}
