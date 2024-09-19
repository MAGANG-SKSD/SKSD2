<?php

namespace App\Http\Controllers;

use App\DataTables\ApbdesDataTable; // Ganti dengan data table yang sesuai
use App\Models\Apbdes; // Ganti dengan model yang sesuai
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApbdesController extends Controller
{
    public function index(ApbdesDataTable $table)
    {
        if (\Auth::user()->can('manage-apbdes')) { // Ganti nama permission jika diperlukan
            return $table->render('apbdes.index'); // Ganti nama view jika diperlukan
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function create()
    {
        if (\Auth::user()->can('create-apbdes')) { // Ganti nama permission jika diperlukan

            $apbdes = Apbdes::get(); // Ganti dengan model yang sesuai
            return view('apbdes.create', compact('apbdes')); // Ganti nama view jika diperlukan
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function store(Request $request)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));

        if (\Auth::user()->can('create-apbdes')) { // Ganti nama permission jika diperlukan

            $apbdes = new Apbdes(); // Ganti dengan model yang sesuai
            $apbdes->name = $request->name;
            $apbdes->save();
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
            return redirect()->route('apbdes.index') // Ganti nama route jika diperlukan
                ->with('success', __('Apbdes created successfully'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function show(Apbdes $apbdes) // Ganti dengan model yang sesuai jika diperlukan
    {
    }

    public function edit($id)
    {
        if (\Auth::user()->can('edit-apbdes')) { // Ganti nama permission jika diperlukan

            $apbdes = Apbdes::find($id); // Ganti dengan model yang sesuai
            return view('apbdes.edit', compact('apbdes')); // Ganti nama view jika diperlukan
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function update(Request $request, $id)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));

        $apbdes = Apbdes::find($id); // Ganti dengan model yang sesuai
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|min:4|unique:apbdes,name,' . $apbdes->id,
        ], [
            'regex' => 'Invalid Entry! Only letters, underscores, hyphens, and numbers are allowed',
        ]);
        $apbdes->name = str_replace(' ', '-', strtolower($request->name));
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
        $apbdes->save();
        return redirect()->route('apbdes.index') // Ganti nama route jika diperlukan
            ->with('success', 'Apbdes updated successfully.');
    }

    public function destroy($id)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));

        if (\Auth::user()->can('delete-apbdes')) { // Ganti nama permission jika diperlukan

            Apbdes::where('id', $id)->firstOrFail()->delete(); // Ganti dengan model yang sesuai
            return redirect()->route('apbdes.index') // Ganti nama route jika diperlukan
                ->with('success', __('Apbdes deleted successfully.'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }
}
