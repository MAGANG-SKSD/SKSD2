<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desas';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'desa_id',
        'nama_desa',
        'alamat_desa',
        'kode_pos',
        'telepon',
        'email',
    ];

    protected $primaryKey = 'desa_id'; // Set primary key if different from 'id'
    public $timestamps = false;

    // Optionally, specify the date fields for soft deletes
    protected $dates = ['deleted_at'];
}
