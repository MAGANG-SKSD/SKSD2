<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Sp2d
 * @package App\Models
 * @version September 4, 2024, 2:42 pm WIB
 *
 * @property \App\Models\Desa $desa
 * @property integer $desa_id
 * @property integer $nomor_sp2d
 * @property string $tanggal_sp2d
 * @property integer $jumlah_dana
 */
class Sp2d extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'sp2ds';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'sp2d_id';

    public $fillable = [
        'desa_id',
        'nomor_sp2d',
        'tanggal_sp2d',
        'jumlah_dana'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sp2d_id' => 'integer',
        'desa_id' => 'integer',
        'nomor_sp2d' => 'integer',
        'tanggal_sp2d' => 'date',
        'jumlah_dana' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor_sp2d' => 'required',
        'tanggal_sp2d' => 'required',
        'jumlah_dana' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function desa()
    {
        return $this->belongsTo(\App\Models\Desa::class, 'desa_id', '');
    }
}
