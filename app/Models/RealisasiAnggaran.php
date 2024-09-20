<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisasiAnggaran extends Model
{
    use HasFactory;

    protected $table = 'anggaran_realisasi';

    protected $fillable = [
        'desa_id',
        'tahun',
        'belanja_realisasi',
        'dana_tidak_terpakai',
        'laporan',
    ];

    // Optionally, specify the date fields for soft deletes
    protected $dates = ['deleted_at'];
}
