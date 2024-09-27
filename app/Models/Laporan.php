<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',    // Kolom ini disesuaikan dengan kolom di tabel laporan
        'tanggal',  // Kolom ini disesuaikan dengan kolom di tabel laporan
        // Tambahkan kolom lain sesuai kebutuhan
    ];
}
