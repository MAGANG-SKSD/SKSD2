<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPerintah extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan (jika berbeda dari konvensi)
    protected $table = 'surat_perintah'; // Ganti dengan nama tabel Anda

    // Tentukan field yang dapat diisi
    protected $fillable = [
        'judul',
        'tanggal',
    ];

    // Jika Anda ingin menambahkan relasi, lakukan di sini
}
