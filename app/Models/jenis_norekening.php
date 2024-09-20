<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Norekening extends Model
{
    protected $table = "jenis_norekening";
    protected $guarded = [];

    public function kelompok_norekening()
    {
        return $this->hasMany('App\models\Kelompok_Norekening');
    }
}
