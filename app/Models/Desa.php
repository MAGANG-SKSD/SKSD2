<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desa';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'nama_desa',
        'alamat_desa',
        'kode_pos',
        'telepon',
        'email',
    ];

    // Optionally, specify the date fields for soft deletes
    protected $dates = ['deleted_at'];
}
