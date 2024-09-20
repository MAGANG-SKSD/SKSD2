<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok_Norekening extends Model
{
    protected $table = "kelompok_norekenin";
    protected $guarded = [];

    public function jenis_norekenin()
    {
        return $this->belongsTo('App\Models\jenis_norekening');
    }

    public function detail_norekening()
    {
        return $this->hasMany('App\Models\detail_norekening');
    }
}
