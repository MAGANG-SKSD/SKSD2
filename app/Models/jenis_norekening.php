<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Norekening extends Model
{
    protected $table = "jenis_norekening";
    protected $guarded = [];

    // Relasi ke Detail Norekening
    public function detail_norekenings()
    {
        return $this->hasMany(Detail_Norekening::class);
    }
}
