<?php

namespace App\Http\Controllers;

use App\DataTables\ModulsDataTable;
use App\Models\Modul;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModulController extends Controller
{


    public function index(ModulsDataTable $table)
    {
        if (\Auth::user()->can('manage-module')) {
            return $table->render('moduls.index');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }


    public function create()
    {
        if (\Auth::user()->can('create-module')) {

            $modual = Modul::get();
            return view('moduls.create', compact('modual'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }


    public function store(Request $request)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));
        if (\Auth::user()->can('create-module')) {

            $modual = new Modul();
            $modual->name = $request->name;
            $modual->save();
            $data = [];
            if (!empty($request['permissions'])) {
                foreach ($request['permissions'] as $check) {
                    if ($check == 'M') {
                        $data[] = ['name' => 'manage-' . $request->name];
                    } else if ($check == 'C') {
                        $data[] = ['name' => 'create-' . $request->name];
                    } else if ($check == 'E') {
                        $data[] = ['name' => 'edit-' . $request->name];
                    } else if ($check == 'D') {
                        $data[] = ['name' => 'delete-' . $request->name];
                    } else if ($check == 'S') {
                        $data[] = ['name' => 'show-' . $request->name];
                    }
                }
            }
            permission::insert($data);
            return redirect()->route('modules.index')
                ->with('success', __('modual updated successfully'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }


    public function show(Modul $modual)
    {
    }


    public function edit($id)
    {

        if (\Auth::user()->can('edit-module')) {

            $modual = Modul::find($id);
            return view('moduls.edit', compact('modual'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }


    public function update(Request $request, $id)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));

        $modules = Modul::find($id);
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|min:4|unique:moduls,name,' . $modules->id,
        ], [
            'regex' => 'Invalid Entry! Only letters,underscores,hypens and numbers are allowed',
        ]);
        $modules->name = str_replace(' ', '-', strtolower($request->name));
        $permissions = DB::table('permissions')
            ->where('name', 'like', '%' . $request->old_name . '%')
            ->get();
        $module_name  = str_replace(' ', '-', strtolower($request->name));
        foreach ($permissions as $permission) {
            $update_permission = permission::find($permission->id);
            if ($permission->name == 'manage-' . $request->old_name) {
                $update_permission->name = 'manage-' . $module_name;
            }
            if ($permission->name == 'create-' . $request->old_name) {
                $update_permission->name = 'create-' . $module_name;
            }
            if ($permission->name == 'edit-' . $request->old_name) {
                $update_permission->name = 'edit-' . $module_name;
            }
            if ($permission->name == 'delete-' . $request->old_name) {
                $update_permission->name = 'delete-' . $module_name;
            }
            if ($permission->name == 'show-' . $request->old_name) {
                $update_permission->name = 'show-' . $module_name;
            }
            $update_permission->save();
        }
        $modules->save();
        return redirect()->route('modules.index')->with('success', 'Module Updated Successfully.');
    }


    public function destroy($id)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));
        if (\Auth::user()->can('delete-module')) {

            Modul::where('id', $id)->firstorfail()->delete();
            return redirect()->route('modules.index')->with('success', __('Modul deleted Successfully.'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }
}
