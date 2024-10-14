<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoRekening extends Model
{
    use HasFactory;

    protected $table = 'jenis_norekening';
    protected $fillable = [
        'id', // atau bisa dihapus jika kolom auto-increment
        'nama', // dan kolom lainnya sesuai dengan tabel Anda
    ];
}
