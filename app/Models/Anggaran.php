<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    use HasFactory;

    protected $table = 'anggaran';
    protected $fillable = [
        'tahun', 
        'detail_norekening_id', 
        'keterangan_lainnya', 
        'nilai_anggaran', 
        'verifikasi', 
        'status',
        'nilai_realisasi',
    ];

    public function detail_norekening()
    {
        return $this->belongsTo('App\Models\Detail_Norekening', 'detail_norekening_id');
    }
    public function jenis_norekening()
    {
        return $this->hasOneThrough(Jenis_Norekening::class, Detail_Norekening::class, 'id', 'id', 'detail_norekening_id', 'jenis_norekening_id');
    }

    public function kelompok_norekening()
    {
        return $this->hasOneThrough(Kelompok_Norekening::class, Jenis_Norekening::class, 'id', 'id', 'jenis_norekening_id', 'kelompok_norekening_id');
    }

    // Fungsi untuk toggle verifikasi
    public function toggleVerifikasi()
    {
        $this->verifikasi = !$this->verifikasi;
        $this->save();
    }

    // Fungsi untuk toggle status
    public function toggleStatus()
    {
        $this->status = !$this->status;
        $this->save();
    }
}
