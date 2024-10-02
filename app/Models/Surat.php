<?php

// app/Models/Surat.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'tanggal',
        // tambahkan field lain sesuai kebutuhan
    ];
}
