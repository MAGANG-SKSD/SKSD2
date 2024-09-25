<?php

namespace Database\Seeders;

use App\Models\Modul;
use App\Models\Jenis_Norekening;
use App\Models\Kelompok_Norekening;
use App\Models\Detail_Norekening;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

        public function run()
    {
        $permissions = [
            'manage-permission','create-permission','edit-permission','delete-permission',
            'manage-role','create-role','edit-role','delete-role','show-role',
            'manage-user','create-user','edit-user','delete-user','show-user',
            'manage-module','create-module','delete-module','show-module','edit-module',
            'manage-setting',
            'manage-crud',
            'manage-language','create-language','delete-language','show-language','edit-language',
            'manage-anggarankas','create-angarankas','delete-anggarankas','show-anggarankas','edit-anggarankas',
            'manage-apbdes','create-apbdes','delete-apbdes','show-apbdes','edit-apbdes',
            'manage-dana','create-dana','delete-dana','show-dana','edit-dana',
            'manage-desa','create-desa','delete-desa','show-desa','edit-desa',
            'manage-dokumen','create-dokumen','delete-dokumen','show-dokumen','edit-dokumen',
            'manage-norekening','create-norekening','delete-norekening','show-norekening','edit-norekening',
            'manage-reaalisasianggaran','create-realisasianggaran','delete-realisasianggaran','show-realisasianggaran','edit-realisasianggaran',
            'manage-sp2d','create-sp2d','delete-sp2d','show-sp2d','edit-sp2d',
        ];

        $modules = [
            'user','role','module','setting','crud','language','permission','anggarankas','apbdes','dana','desa','dokumen','norekening','realisasianggaran','sp2d',
        ];

        foreach($permissions as $permission){
            Permission::create([
                'name'=>$permission
            ]);
        }

        $role = Role::create([
            'name'=>'admin'
        ]);
        Role::create([
            'name'=>'user'
        ]);

        foreach($permissions as $permission){
            $per = Permission::findByName($permission);
            $role->givePermissionTo($per);
        }

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'avatar' => ('avatar.png'),
            'type'=>'admin',
            'lang'=>'en',
            'created_by'=>'0',
        ]);

        $user->assignRole($role->id);

        foreach($modules as $module){
            Modul::create([
                'name'=>$module
            ]);
        }
    }
}

