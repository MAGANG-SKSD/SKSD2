<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anggaran;
use App\Models\RealisasiAnggaran;

class APBDes extends Model
{
    use HasFactory;

    protected $table = 'apbdes';

    // Relasi dengan anggaran
    public function anggaran()
    {
        return $this->hasMany(Anggaran::class);
    }

    // Relasi dengan realisasi anggaran
    public function realisasianggarans()
    {
        return $this->hasMany(RealisasiAnggaran::class);
    }
}
