<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    protected $table = "anggaran";
    protected $fillable = ['tahun','detail_norekening_id','nilai_anggaran','keterangan_lainnya'];

    public function detail_jenis_anggaran()
    {
        return $this->belongsTo('App\Models\DetailNorekening');
    }
}
