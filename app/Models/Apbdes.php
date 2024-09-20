<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APBDes extends Model
{
    use HasFactory;

    protected $table = 'apbdes';

    protected $fillable = [
        'desa_id',
        'tahun',
        'total_anggaran',
        'status_persetujuan',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function anggaranDetails()
{
    return $this->hasMany(AnggaranDetail::class);
}

public function realisasiDetails()
{
    return $this->hasMany(RealisasiDetail::class);
}

}
