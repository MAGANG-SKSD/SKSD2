<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    use HasFactory; // Added the HasFactory trait

    protected $table = 'anggaran';
    protected $fillable = [
        'tahun', 
        'detail_norekening_id', 
        'keterangan_lainnya', 
        'nilai_anggaran', 
        'verifikasi', 
        'status',
    ];

    public function detail_norekening()
{
    return $this->belongsTo('App\Models\Detail_Norekening', 'detail_norekening_id');
}

    // Function to toggle verification status
    public function toggleVerifikasi()
    {
        $this->verifikasi = !$this->verifikasi;
        $this->save();
    }

    // Function to toggle active status
    public function toggleStatus()
    {
        $this->status = !$this->status;
        $this->save();
    }
}
