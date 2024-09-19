<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Norekening extends Model
{
    protected $table = "detail_norekening";
    protected $guarded = [];

    public function kelompok_norekening()
    {
        return $this->belongsTo('App\Models\Kelompok_Norekening');
    }

    public function jenis_norekening()
    {
        return $this->belongsTo('App\Models\Jenis_norekening');
    }

    public function realisasi_anggaran()
    {
        return $this->hasMany('App\Models\RealisasiAnggaran');
    }
}
