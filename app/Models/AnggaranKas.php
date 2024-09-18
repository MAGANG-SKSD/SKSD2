<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class AnggaranKas
 * @package App\Models
 * @version September 12, 2024, 10:29 am WIB
 *
 * @property \App\Models\desa_id $
 * @property integer $desa_id
 * @property string $tahun
 * @property integer $total_anggaran
 * @property string $status_persetujuan
 */
class AnggaranKas extends Model
{
    use SoftDeletes;


    public $table = 'AnggaranKas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'desa_id',
        'tahun',
        'total_anggaran',
        'status_persetujuan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'anggaran-kas_id' => 'integer',
        'desa_id' => 'integer',
        'tahun' => 'date',
        'total_anggaran' => 'integer',
        'status_persetujuan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
