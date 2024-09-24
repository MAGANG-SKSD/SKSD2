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
        Detail_Norekening::create([
            'id'                        => 411,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Hasil Usaha Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 41101,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Bagi Hasil BUMDes'
        ]);
        Detail_Norekening::create([
            'id'                        => 41190,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Lain lain Hasil'
        ]);
        Detail_Norekening::create([
            'id'                        => 412,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Hasil Aset'
        ]);
        Detail_Norekening::create([
            'id'                        => 41201,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Pengelolaan Tanah Kas Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 41202,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Tambatan Perahu'
        ]);
        Detail_Norekening::create([
            'id'                        => 41203,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Pasar Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 41204,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Tempat Pemandian Umum'
        ]);
        Detail_Norekening::create([
            'id'                        => 41205,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Jaringan Irigasi Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 41206,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Pelelangan Ikan Milik Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 41207,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Kios Milik Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 41208,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Pemanfaatan Lapangan/Prasarana Olah raga Milik Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 41290,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Aset Lain-Lain'
        ]);
        Detail_Norekening::create([
            'id'                        => 413,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Swadaya, partisipasi dan gotong royong'
        ]);
        Detail_Norekening::create([
            'id'                        => 41390,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Swadaya, partisipasi dan gotong royon Lain Lain'
        ]);
        Detail_Norekening::create([
            'id'                        => 414,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Pendapatan Asli Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 41401,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Hasil Pungutan Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 41490,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 41,
            'nama'                      => 'Pendapatan Lain Lain'
        ]);
        Detail_Norekening::create([
            'id'                        => 421,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 42,
            'nama'                      => 'Dana Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 42101,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 42,
            'nama'                      => 'Pendapatan Asli Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 422,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 42,
            'nama'                      => 'Bagian dari Hasil Pajak dan Retribusi Daerah Kabupaten/kota'
        ]);
        Detail_Norekening::create([
            'id'                        => 423,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 42,
            'nama'                      => 'Alokasi Dana'
        ]);
        Detail_Norekening::create([
            'id'                        => 424,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 42,
            'nama'                      => 'Bantuan Keuangan Provinsi'
        ]);
        Detail_Norekening::create([
            'id'                        => 42401,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 42,
            'nama'                      => 'Bantuan Keuangan dari APBD Provinsi'
        ]);
        Detail_Norekening::create([
            'id'                        => 42490,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 42,
            'nama'                      => 'Bantuan Lain Lain'
        ]);
        Detail_Norekening::create([
            'id'                        => 425,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 42,
            'nama'                      => 'Bantuan Keuangan APBD Kabupaten/Kota'
        ]);
        Detail_Norekening::create([
            'id'                        => 42599,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 42,
            'nama'                      => 'Lain Lain Bantuan Keuangan APBD Kabupaten/Kota'
        ]);
        Detail_Norekening::create([
            'id'                        => 431,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 43,
            'nama'                      => 'Penerimaan dari Hasil Kerjasama antar Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 432,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 43,
            'nama'                      => 'Penerimaan dari Hasil Kerjasama Desa dengan Pihak Ketiga'
        ]);
        Detail_Norekening::create([
            'id'                        => 433,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 43,
            'nama'                      => 'Penerimaan dari Bantuan Perusahaan yang berlokasi di Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 434,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 43,
            'nama'                      => 'Hibah dan sumbangan dari Pihak Ketiga'
        ]);
        Detail_Norekening::create([
            'id'                        => 435,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 43,
            'nama'                      => 'Koreksi kesalahan belanja tahun-tahun anggaran sebelumnya yang mengakibatkan penerimaan di kas Desa pada tahun anggaran berjalan'
        ]);
        Detail_Norekening::create([
            'id'                        => 436,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 43,
            'nama'                      => 'Bunga Bank'
        ]);
        Detail_Norekening::create([
            'id'                        => 439,
            'jenis_norekening_id'         => 4,
            'kelompok_norekening_id'=> 43,
            'nama'                      => 'Lain Lain Pendapatan Desa yang sah'
        ]);
        Detail_Norekening::create([
            'id'                        => 511,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Penghasilan Tetap dan Tunjangan Kepala Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 51101,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Penghasilan Tetap Kepala Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 51102,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Tunjangan Perangkat Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 51190,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Penerimaan Lain Perangkat Desa yang sah'
        ]);
        Detail_Norekening::create([
            'id'                        => 512,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Penghasilan Tetap dan Tunjangan Perangkat Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 51202,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Tunjangan Perangkat Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 51290,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Penerimaan Lain Perangkat Desa yang sah'
        ]);
        Detail_Norekening::create([
            'id'                        => 513,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Jaminan Sosial Kepala Desa dan Perangkat Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 51301,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Jaminan Kesehatan Kepala Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 51302,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Jaminan Kesehatan Perangkat Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 51303,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Jaminan Ketenagakerjaan Kepala Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 51304,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Jaminan Ketenagakerjaan Perangkat Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 514,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Tunjangan BPD'
        ]);
        Detail_Norekening::create([
            'id'                        => 51401,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Tunjangan Kependudukan BPD'
        ]);
        Detail_Norekening::create([
            'id'                        => 51402,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Tunjangan Kinerja BPD'
        ]);
        Detail_Norekening::create([
            'id'                        => 521,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Barang Perlengkapan'
        ]);
        Detail_Norekening::create([
            'id'                        => 52101,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Perlengkapan Alat Tulis Kantor dan Benda Pos'
        ]);
        Detail_Norekening::create([
            'id'                        => 52102,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Perlengkapan Alat-alat Listrik'
        ]);
        Detail_Norekening::create([
            'id'                        => 52103,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Perlengkapan Alat-alat Rumah Tangga/Peralatan dan Bahan Kebersihan'
        ]);
        Detail_Norekening::create([
            'id'                        => 52104,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Pemadam Kebakaran'
        ]);
        Detail_Norekening::create([
            'id'                        => 52105,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Bahan Bakar Minyak/Gas/Isi Ulang Tabung Pemadam Kebakarans'
        ]);
        Detail_Norekening::create([
            'id'                        => 52106,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Perlengkapan Barang Konsumsi (Makan/minum) - Belanja Barang Konsumsi'
        ]);
        Detail_Norekening::create([
            'id'                        => 52107,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Bahan Material'
        ]);
        Detail_Norekening::create([
            'id'                        => 52108,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Bendera/umbul-umbul/spanduk'
        ]);
        Detail_Norekening::create([
            'id'                        => 52109,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Pakaian Dinas/Seragam/Atribut'
        ]);
        Detail_Norekening::create([
            'id'                        => 52110,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Obat-Obatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 52111,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja pakan Hewan/Ikan, Obat-Obatan Hewan'
        ]);
        Detail_Norekening::create([
            'id'                        => 52112,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Pupuk/Obat-Obatan Pertanian'
        ]);
        Detail_Norekening::create([
            'id'                        => 52190,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Barang Perlengkapan Lainnya'
        ]);
        Detail_Norekening::create([
            'id'                        => 522,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Honorarium'
        ]);
        Detail_Norekening::create([
            'id'                        => 52201,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Honorarium Tim yang Melaksanakan Kegiatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 52202,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Honorarium Pembantu Tugas Umum Desa/Operator'
        ]);
        Detail_Norekening::create([
            'id'                        => 52203,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Honorarium/Insentif Pelayanan Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 52204,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Honorarium Ahli/Profesi/Konsultan/Narasumber'
        ]);
        Detail_Norekening::create([
            'id'                        => 52205,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Honorarium Petugas'
        ]);
        Detail_Norekening::create([
            'id'                        => 52290,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Honorarium Lainnya'
        ]);
        Detail_Norekening::create([
            'id'                        => 523,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Perjalanan Dinas'
        ]);
        Detail_Norekening::create([
            'id'                        => 52301,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Perjalanan Dinas Dalam Kabupaten/Kota'
        ]);
        Detail_Norekening::create([
            'id'                        => 52302,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Perjalanan Dinas Luar Kabupaten/Kota'
        ]);
        Detail_Norekening::create([
            'id'                        => 52303,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Kursus/Pelatihan'
        ]);
        Detail_Norekening::create([
            'id'                        => 524,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Sewa'
        ]);
        

    }
}