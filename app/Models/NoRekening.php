<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoRekening extends Model
{
    use HasFactory;

    // Set the correct table for this model
    protected $table = 'detail_norekening'; 

    // Allow mass assignment on the following fields
    protected $fillable = [
        'id',
        'jenis_norekening_id',
        'kelompok_norekening_id',
        'nama',
    ];

    // Define the relationship with Jenis Norekening
    public function jenis_norekening()
    {
        return $this->belongsTo(Jenis_Norekening::class, 'jenis_norekening_id');
    }

    public function kelompok_norekening()
    {
        return $this->belongsTo(Kelompok_Norekening::class, 'kelompok_norekening_id');
    }


    // Accessor for Jenis Norekening Name
    public function getJenisNorekeningNamaAttribute()
    {
        return $this->jenis_norekening ? $this->jenis_norekening->nama : '-';
    }

    // Accessor for Kelompok Norekening Name
    public function getKelompokNorekeningNamaAttribute()
    {
        return $this->kelompok_norekening ? $this->kelompok_norekening->nama : '-';
    }
}