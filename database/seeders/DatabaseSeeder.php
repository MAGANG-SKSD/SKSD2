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
            'id'                        => 41299,
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
            'id'                        => 41399,
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
            'id'                        => 41499,
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
            'id'                        => 42499,
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
            'id'                        => 51199,
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
            'id'                        => 51201,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 51,
            'nama'                      => 'Tunjangan Perangkat Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 51299,
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
            'id'                        => 52199,
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
            'id'                        => 52299,
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
        Detail_Norekening::create([
            'id'                        => 52401,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Sewa Bangunan/Gedung/Ruang'
        ]);
        Detail_Norekening::create([
            'id'                        => 52402,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Sewa Peralatan/Perlengkapan'
        ]);
        Detail_Norekening::create([
            'id'                        => 52403,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Sewa Sarana Mobilitas'
        ]);
        Detail_Norekening::create([
            'id'                        => 52499,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Sewa Lainnya'
        ]);
        Detail_Norekening::create([
            'id'                        => 525,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Operasional Perkantoran'
        ]);
        Detail_Norekening::create([
            'id'                        => 52501,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Langganan Listrik'
        ]);
        Detail_Norekening::create([
            'id'                        => 52502,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Langganan Air Bersih'
        ]);
        Detail_Norekening::create([
            'id'                        => 52503,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Langganan Majalah/Surat Kabar'
        ]);
        Detail_Norekening::create([
            'id'                        => 52504,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Langganan Telepon'
        ]);
        Detail_Norekening::create([
            'id'                        => 52505,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Langganan Internet'
        ]);
        Detail_Norekening::create([
            'id'                        => 52506,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Kurir/Pos/Giro'
        ]);
        Detail_Norekening::create([
            'id'                        => 52507,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Jasa Perpanjangan Ijin/Pajak'
        ]);
        Detail_Norekening::create([
            'id'                        => 52599,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Operasional Perkantoran Lainnya'
        ]);
        Detail_Norekening::create([
            'id'                        => 526,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Pemeliharaan'
        ]);
        Detail_Norekening::create([
            'id'                        => 52601,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Pemeliharaan Mesin dan Peralatan Berat'
        ]);
        Detail_Norekening::create([
            'id'                        => 52602,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Pemeliharaan Kendaraan Bermotor'
        ]);
        Detail_Norekening::create([
            'id'                        => 52603,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Pemeliharaan Peralatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 52604,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Pemeliharaan Bangunan'
        ]);
        Detail_Norekening::create([
            'id'                        => 52605,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Pemeliharaan Jalan'
        ]);
        Detail_Norekening::create([
            'id'                        => 52606,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Pemeliharaan Jembatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 52607,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Pemeliharaan Irigasi/Saluran Sungai/Embung/Air Bersih, jaringan Air Limbah, Persampahan, dll'
        ]);
        Detail_Norekening::create([
            'id'                        => 52608,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Pemeliharaan Jaringan dan Instalasi (Listrik, Telepon, Internet, Komunikasi, dll'
        ]);
        Detail_Norekening::create([
            'id'                        => 52699,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Pemeliharaan Lainnya'
        ]);
        Detail_Norekening::create([
            'id'                        => 527,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Barang Dan Jasa yang Diserahkan Kepada Masyarakat'
        ]);
        Detail_Norekening::create([
            'id'                        => 52701,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Bahan Perlengkapan yang Diserahkan Ke Masyarakat'
        ]);
        Detail_Norekening::create([
            'id'                        => 52702,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Bantuan Mesin/Kendaraaan bermotor/Peralatan yang diserahkan ke masyarakat'
        ]);
        Detail_Norekening::create([
            'id'                        => 52703,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Bantuan Bangunan yang Diserahkan ke Masyarakat'
        ]);
        Detail_Norekening::create([
            'id'                        => 52704,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Beasiswa Berprestasi/Masyarakat Miskin'
        ]);
        Detail_Norekening::create([
            'id'                        => 52705,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Bantuan Bibit Tanaman/Hewan/Ikan'
        ]);
        Detail_Norekening::create([
            'id'                        => 52799,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 52,
            'nama'                      => 'Belanja Barang dan Jasa yang Diserahkan kepada Masyarakat Lainnya'
        ]);
        Detail_Norekening::create([
            'id'                        => 531,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Pengadaan Tanah'
        ]);
        Detail_Norekening::create([
            'id'                        => 53101,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Pembebasan/Pembelian Tanah'
        ]);
        Detail_Norekening::create([
            'id'                        => 53102,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Pembayaran Honorarium Tim Tanah'
        ]);
        Detail_Norekening::create([
            'id'                        => 53103,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Pengukuran dan Pembuatan Sertifikat Tanah'
        ]);
        Detail_Norekening::create([
            'id'                        => 53104,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Pengukuran dan Pematangan Tanah'
        ]);
        Detail_Norekening::create([
            'id'                        => 53105,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Perjalanan Pengadaan Tanah'
        ]);
        Detail_Norekening::create([
            'id'                        => 53199,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Pengadaan Tanah Lainnya'
        ]);
        Detail_Norekening::create([
            'id'                        => 532,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Peralatan, Mesin, dan Alat Berat'
        ]);
        Detail_Norekening::create([
            'id'                        => 53201,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Honor Tim yang Melakukan Kegiatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53202,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Peralatan Elektronik dan Alat Studio'
        ]);
        Detail_Norekening::create([
            'id'                        => 53203,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Peralatan Komputer'
        ]);
        Detail_Norekening::create([
            'id'                        => 53204,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Mebeulair dan Aksesori Ruangan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53205,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Peralatan Dapur'
        ]);
        Detail_Norekening::create([
            'id'                        => 53206,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Peralatan Alat Ukur/Rambu-Rambu'
        ]);
        Detail_Norekening::create([
            'id'                        => 53207,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Peralatan Rambu-Rambu/Patok Tanah'
        ]);
        Detail_Norekening::create([
            'id'                        => 53208,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Peralatan Khusus Kesehatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53209,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Peralatan Khusus Pertanian/Perikanan/Peternakan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53210,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Mesin'
        ]);
        Detail_Norekening::create([
            'id'                        => 53211,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Pengadaan Alat-alat Berat'
        ]);
        Detail_Norekening::create([
            'id'                        => 53299,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Peralatan, Mesin, dan Alat Berat Lainnya'
        ]);
        Detail_Norekening::create([
            'id'                        => 533,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Kendaraan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53301,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Honor Tim yang Melakukan Kegiatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53302,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Kendaraan Darat Bermotor'
        ]);
        Detail_Norekening::create([
            'id'                        => 53303,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Angkutan Darat Tidak Bermotor'
        ]);
        Detail_Norekening::create([
            'id'                        => 53304,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Kendaraan Air Bermotor'
        ]);
        Detail_Norekening::create([
            'id'                        => 53305,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Kendaraan Air Tidak Bermotor'
        ]);
        Detail_Norekening::create([
            'id'                        => 53399,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Kendaraan Lainnya'
        ]);
        Detail_Norekening::create([
            'id'                        => 534,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Gedung, Bangunan dan Taman'
        ]);
        Detail_Norekening::create([
            'id'                        => 53401,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Honor Tim yang Melaksanakan Kegiatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53402,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Upah Tenaga Kerja'
        ]);
        Detail_Norekening::create([
            'id'                        => 53403,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Bahan Baku'
        ]);
        Detail_Norekening::create([
            'id'                        => 53404,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Sewa Peralatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 535,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Jalan/Prasarana Jalan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53501,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Honor Tim yang Melaksanakan Kegiatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53502,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Upah Tenaga Kerja'
        ]);
        Detail_Norekening::create([
            'id'                        => 53503,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Bahan Baku'
        ]);
        Detail_Norekening::create([
            'id'                        => 53504,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Sewa Peralatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 536,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Jembatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53601,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Honor Tim yang Melaksanakan Kegiatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53602,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Upah Tenaga Kerja'
        ]);
        Detail_Norekening::create([
            'id'                        => 53603,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Bahan Baku'
        ]);
        Detail_Norekening::create([
            'id'                        => 53604,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Sewa Peralatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 537,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Irigasi/Embung/Air Sungai/Drainase/Air Limbah/Persampahan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53701,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Honor Tim yang Melaksanakan Kegiatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53702,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Upah Tenaga Kerja'
        ]);
        Detail_Norekening::create([
            'id'                        => 53703,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Bahan Baku'
        ]);
        Detail_Norekening::create([
            'id'                        => 53704,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Sewa Peralatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 538,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Jaringan/Instalasi'
        ]);
        Detail_Norekening::create([
            'id'                        => 53801,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Honor Tim yang Melaksanakan Kegiatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53802,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Upah Tenaga Kerja'
        ]);
        Detail_Norekening::create([
            'id'                        => 53803,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Bahan Baku'
        ]);
        Detail_Norekening::create([
            'id'                        => 53804,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Sewa Peralatan'
        ]);
        Detail_Norekening::create([
            'id'                        => 539,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal LAINNYA'
        ]);
        Detail_Norekening::create([
            'id'                        => 53901,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Khusus Pendidikan dan Perpustakaan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53902,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal khusus Olahraga'
        ]);
        Detail_Norekening::create([
            'id'                        => 53903,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal khusus Kesenian/Kebudayaan/Keagamaan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53904,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Tumbuhan/Tanaman'
        ]);
        Detail_Norekening::create([
            'id'                        => 53905,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Hewan'
        ]);
        Detail_Norekening::create([
            'id'                        => 53999,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 53,
            'nama'                      => 'Belanja Modal Lainnya'
        ]);
        Detail_Norekening::create([
            'id'                        => 541,
            'jenis_norekening_id'         => 5,
            'kelompok_norekening_id'=> 54,
            'nama'                      => 'Belanja Tak Terduga'
        ]);
        Detail_Norekening::create([
            'id'                        => 611,
            'jenis_norekening_id'         => 6,
            'kelompok_norekening_id'=> 61,
            'nama'                      => 'SILPA Tahun Sebeumnya'
        ]);
        Detail_Norekening::create([
            'id'                        => 612,
            'jenis_norekening_id'         => 6,
            'kelompok_norekening_id'=> 61,
            'nama'                      => 'Pencairan Dana Cadangan'
        ]);
        Detail_Norekening::create([
            'id'                        => 613,
            'jenis_norekening_id'         => 6,
            'kelompok_norekening_id'=> 61,
            'nama'                      => 'Hasil Penjualan Kekayaan Desa yang Dipisahkan'
        ]);
        Detail_Norekening::create([
            'id'                        => 619,
            'jenis_norekening_id'         => 6,
            'kelompok_norekening_id'=> 61,
            'nama'                      => 'Penerimaan Pembiayaan Lainnya'
        ]);
        Detail_Norekening::create([
            'id'                        => 621,
            'jenis_norekening_id'         => 6,
            'kelompok_norekening_id'=> 62,
            'nama'                      => 'Pembentukan Dana Cadangan'
        ]);
        Detail_Norekening::create([
            'id'                        => 622,
            'jenis_norekening_id'         => 6,
            'kelompok_norekening_id'=> 62,
            'nama'                      => 'Penyertaan Modal Desa'
        ]);
        Detail_Norekening::create([
            'id'                        => 629,
            'jenis_norekening_id'         => 6,
            'kelompok_norekening_id'=> 62,
            'nama'                      => 'Pengeluaran Pembiayaan Lainnya'
        ]);
    }
}