<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class RealisasiAnggaran
 * @package App\Models
 * @version September 4, 2024, 2:42 pm WIB
 *
 * @property \App\Models\Desa $desa
 * @property integer $desa_id
 * @property string $tahun
 * @property integer $belanja_realisasi
 * @property integer $dana_tidak_terpakai
 * @property string $laporan
 */
class RealisasiAnggaran extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'realisasi_anggarans';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'realisasi_id';

    public $fillable = [
        'desa_id',
        'tahun',
        'belanja_realisasi',
        'dana_tidak_terpakai',
        'laporan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'realisasi_id' => 'integer',
        'desa_id' => 'integer',
        'tahun' => 'date',
        'belanja_realisasi' => 'integer',
        'dana_tidak_terpakai' => 'integer',
        'laporan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tahun' => 'required',
        'belanja_realisasi' => 'required',
        'dana_tidak_terpakai' => 'required',
        'laporan' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function desa()
    {
        return $this->belongsTo(\App\Models\Desa::class, 'desa_id', '');
    }
}
