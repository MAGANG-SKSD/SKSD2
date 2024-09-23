<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APBDes extends Model
{
    use HasFactory;

    protected $table = 'apbdes'; // Sesuaikan dengan nama tabel di database
    protected $fillable = ['nama_apbdes', 'tahun', 'anggaran', 'status']; // Sesuaikan dengan kolom yang ada

}
