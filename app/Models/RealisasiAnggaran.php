<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisasiAnggaran extends Model
{
    use HasFactory;

    protected $table = 'anggaran';

    protected $fillable = [
        'id',
        'tahun',
        'detail_norekening_id',
        'keterangan_lainnya',
        'nilai_anggaran',
        'status',
        'dana_realisasi',
    ];

    // Optionally, specify the date fields for soft deletes
    protected $dates = ['deleted_at'];
}
