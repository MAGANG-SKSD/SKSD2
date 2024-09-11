<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Apbdes
 * @package App\Models
 * @version September 4, 2024, 2:37 pm WIB
 *
 * @property \App\Models\Desa $desa
 * @property integer $desa_id
 * @property integer $tahun
 * @property integer $pendapatan
 * @property integer $belanja
 * @property integer $pembiayaan
 * @property string $status_verifikasi
 */
class Apbdes extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'apbdes';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'apbdes_id';

    public $fillable = [
        'desa_id',
        'tahun',
        'pendapatan',
        'belanja',
        'pembiayaan',
        'status_verifikasi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'apbdes_id' => 'integer',
        'desa_id' => 'integer',
        'tahun' => 'integer',
        'pendapatan' => 'integer',
        'belanja' => 'integer',
        'pembiayaan' => 'integer',
        'status_verifikasi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tahun' => 'required',
        'pendapatan' => 'required',
        'belanja' => 'required',
        'pembiayaan' => 'required',
        'status_verifikasi' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function desa()
    {
        return $this->belongsTo(\App\Models\Desa::class, 'desa_id', '');
    }
}
