<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desa extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'desas';
    protected $primaryKey = 'desa_id';
    protected $dates = ['deleted_at'];
    protected $fillable = ['nama_desa', 'alamat_desa', 'kode_pos', 'telepon', 'email'];

    public static $rules = [
        'nama_desa' => 'required|string|max:255',
        'alamat_desa' => 'required|string|max:255',
        'kode_pos' => 'required|integer',
        'telepon' => 'required|string|max:15',
        'email' => 'required|email|max:255',
    ];
}
