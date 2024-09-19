<?php

namespace App\Http\Controllers;

use App\DataTables\Sp2dsDataTable; // Ganti dengan data table yang sesuai
use App\Models\Sp2d; // Ganti dengan model yang sesuai
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Sp2dController extends Controller
{
    public function index(Sp2dsDataTable $table)
    {
        if (\Auth::user()->can('manage-sp2ds')) { // Ganti nama permission jika diperlukan
            return $table->render('sp2ds.index'); // Ganti nama view jika diperlukan
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function create()
    {
        if (\Auth::user()->can('create-sp2ds')) { // Ganti nama permission jika diperlukan

            $sp2ds = Sp2d::get(); // Ganti dengan model yang sesuai
            return view('sp2ds.create', compact('sp2ds')); // Ganti nama view jika diperlukan
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function store(Request $request)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));

        if (\Auth::user()->can('create-sp2ds')) { // Ganti nama permission jika diperlukan

            $sp2d = new Sp2d(); // Ganti dengan model yang sesuai
            $sp2d->name = $request->name;
            $sp2d->save();
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
            Permission::insert($data); // Ganti dengan model yang sesuai jika perlu
            return redirect()->route('sp2ds.index') // Ganti nama route jika diperlukan
                ->with('success', __('Sp2d created successfully'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function show(Sp2d $sp2d) // Ganti dengan model yang sesuai jika diperlukan
    {
    }

    public function edit($id)
    {
        if (\Auth::user()->can('edit-sp2ds')) { // Ganti nama permission jika diperlukan

            $sp2d = Sp2d::find($id); // Ganti dengan model yang sesuai
            return view('sp2ds.edit', compact('sp2d')); // Ganti nama view jika diperlukan
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function update(Request $request, $id)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));

        $sp2d = Sp2d::find($id); // Ganti dengan model yang sesuai
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|min:4|unique:sp2ds,name,' . $sp2d->id,
        ], [
            'regex' => 'Invalid Entry! Only letters, underscores, hyphens, and numbers are allowed',
        ]);
        $sp2d->name = str_replace(' ', '-', strtolower($request->name));
        $permissions = DB::table('permissions')
            ->where('name', 'like', '%' . $request->old_name . '%')
            ->get();
        $module_name  = str_replace(' ', '-', strtolower($request->name));
        foreach ($permissions as $permission) {
            $update_permission = Permission::find($permission->id); // Ganti dengan model yang sesuai jika perlu
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
        $sp2d->save();
        return redirect()->route('sp2ds.index') // Ganti nama route jika diperlukan
            ->with('success', 'Sp2d updated successfully.');
    }

    public function destroy($id)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));

        if (\Auth::user()->can('delete-sp2ds')) { // Ganti nama permission jika diperlukan

            Sp2d::where('id', $id)->firstOrFail()->delete(); // Ganti dengan model yang sesuai
            return redirect()->route('sp2ds.index') // Ganti nama route jika diperlukan
                ->with('success', __('Sp2d deleted successfully.'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }
}
