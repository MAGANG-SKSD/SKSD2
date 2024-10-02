<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Norekening extends Model
{
   
    protected $table = 'detail_norekening';
    protected $fillable = ['jenis_norekening_id', 'kelompok_norekening_id', 'nama'];

    // Relasi ke Jenis Norekening
    public function jenis_norekening()
    {
        return $this->belongsTo(Jenis_Norekening::class);
    }

    // Relasi ke Kelompok Norekening
    public function kelompok_norekening()
    {
        return $this->belongsTo(Kelompok_Norekening::class);
    }
}
