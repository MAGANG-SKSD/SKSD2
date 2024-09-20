<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    protected $table = "anggaran";
    protected $fillable = ['tahun','detail_norekening_id','nilai_anggaran','keterangan_lainnya','verifikasi', 'status'];


    public function detail_norekening()
    {
        return $this->belongsTo('App\Models\detail_norekening');
    }

    // Fungsi toggle untuk verifikasi
    public function toggleVerifikasi()
    {
        $this->verifikasi = !$this->verifikasi;
        $this->save();
    }

    // Fungsi toggle untuk status
    public function toggleStatus()
    {
        $this->status = !$this->status ;
        $this->save();
    }
}
