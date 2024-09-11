<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AnggaranKas
 * @package App\Models
 * @version September 4, 2024, 2:36 pm WIB
 *
 * @property \App\Models\Desa $desa
 * @property integer $desa_id
 * @property string $tahun
 * @property integer $total_anggaran
 * @property string $status persetujuan
 */
class AnggaranKas extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'anggaran_kas';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'anggaran_kas_id';

    public $fillable = [
        'desa_id',
        'tahun',
        'total_anggaran',
        'status persetujuan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'anggaran_kas_id' => 'integer',
        'desa_id' => 'integer',
        'tahun' => 'date',
        'total_anggaran' => 'integer',
        'status persetujuan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'desa_id' => 'required',
        'tahun' => 'required',
        'total_anggaran' => 'required',
        'status persetujuan' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function desa()
    {
        return $this->belongsTo(\App\Models\Desa::class, 'desa_id', '');
    }
}
