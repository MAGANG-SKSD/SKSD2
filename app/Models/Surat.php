<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surats'; // Nama tabel yang digunakan

    protected $fillable = [
        'nomor_sp2d',
        'tanggal_sp2d',
        'nama_kegiatan',
        'nilai_sp2d',
        'kode_rekening',
        'nama_penerima',
        'bank_tujuan',
        'nomor_rekening_bank',
        'uraian_penggunaan',
        'jenis_belanja',
        'tahun_anggaran',
        'nama_bendahara',
        'status_verifikasi',
    ];

    // Jika ada relasi yang perlu ditambahkan, bisa dituliskan di sini
}
