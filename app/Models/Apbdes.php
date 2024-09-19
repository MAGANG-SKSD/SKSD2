<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apbdes extends Model
{
    use HasFactory;

    protected $table = 'apbdes'; // Nama tabel yang terkait dengan model ini
    protected $fillable = [
        'name', // Sesuaikan dengan kolom-kolom yang ada di tabel APBDes
        // Tambahkan kolom lainnya yang sesuai dengan struktur tabel
    ];
}
