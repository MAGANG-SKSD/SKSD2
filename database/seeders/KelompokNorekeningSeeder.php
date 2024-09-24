<?php

use App\Models\Kelompok_Norekening;
use Illuminate\Database\Seeder;

class KelompokNorekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelompok_Norekening::create([
            'id'                => 41,
            'nama'              => 'Pendapatan Asli Desa'
        ]);

        Kelompok_Norekening::create([
            'id'                => 42,
            'nama'              => 'Transfer'
        ]);

        Kelompok_Norekening::create([
            'id'                => 43,
            'nama'              => 'Pendapatan Lain-lain'
        ]);

        Kelompok_Norekening::create([
            'id'                => 51,
            'nama'              => 'Belanja Pegawai'
        ]);

        Kelompok_Norekening::create([
            'id'                => 52,
            'nama'              => 'Belanja Barang dan Jasa'
        ]);

        Kelompok_Norekening::create([
            'id'                => 53,
            'nama'              => 'BIDANG PEMBINAAN KEMASYARAKATAN'
        ]);

        Kelompok_Norekening::create([
            'id'                => 54,
            'nama'              => 'Belanja Tak Terduga'
        ]);
        Kelompok_Norekening::create([
            'id'                => 61,
            'nama'              => 'Penerimaan Biaya'
        ]);

        Kelompok_Norekening::create([
            'id'                => 62,
            'nama'              => 'Pengeluaran Biaya'
        ]);
    }
}
