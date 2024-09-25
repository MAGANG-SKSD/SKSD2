<?php

use App\Models\Jenis_Norekening;
use Illuminate\Database\Seeder;

class JenisNorekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jenis_Norekening::create([
            'id'    => 4,
            'nama'  => 'PENDAPATAN'
        ]);
        Jenis_Norekening::create([
            'id'    => 5,
            'nama'  => 'BELANJA'
        ]);
        Jenis_Norekening::create([
            'id'    => 6,
            'nama'  => 'PEMBIAYAAN'
        ]);
    }
}
