<?php

namespace App\Http\Controllers;

use App\DataTables\DanaDataTable;
use App\Models\Dana;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DanaController extends Controller
{
    public function index(DanaDataTable $table)
    {
        if (\Auth::user()->can('manage-dana')) {
            return $table->render('danas.index');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function create()
    {
        if (\Auth::user()->can('create-dana')) {
            return view('danas.create');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        Dana::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'date' => $request['date'],
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('danas.index')
            ->with('success', __('dana created successfully'));
    }

    public function show($id)
    {
        if (\Auth::user()->can('show-dana')) {
            $dana = Dana::find($id);
            return view('danas.show', compact('dana'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function edit($id)
    {
        if (\Auth::user()->can('edit-dana')) {
            $dana = Dana::find($id);
            return view('danas.edit', compact('dana'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
}


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        $dana = Dana::find($id);
        $dana->update($request->all());

        return redirect()->route('danas.index')
            ->with('message', __('dana updated successfully'));
    }

    public function destroy($id)
    {
        if (\Auth::user()->can('delete-dana')) {
            if ($id == 1) {
                return redirect()->back()->with('error', 'Permission denied.');
            } else {
                Dana::destroy($id);
                return redirect()->route('danas.index')->with('success', __('dana deleted successfully.'));
            }
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    // Metode lain seperti create, store, edit, update, destroy, dll.
}
