<?php

namespace App\Http\Controllers;

use App\Models\NoRekening;
use Illuminate\Http\Request;

class NoRekeningsController extends Controller
{
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
}
