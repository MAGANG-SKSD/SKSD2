<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Dana
 * @package App\Models
 * @version September 4, 2024, 2:40 pm WIB
 *
 * @property \App\Models\Desa $desa
 * @property integer $desa_id
 * @property integer $jenis_dana
 * @property integer $jumlah_dana
 * @property string $status_pengajuan
 */
class Dana extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'danas';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'dana_id';

    public $fillable = [
        'desa_id',
        'jenis_dana',
        'jumlah_dana',
        'status_pengajuan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'dana_id' => 'integer',
        'desa_id' => 'integer',
        'jenis_dana' => 'integer',
        'jumlah_dana' => 'integer',
        'status_pengajuan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'desa_id' => 'required',
        'jenis_dana' => 'required',
        'jumlah_dana' => 'required',
        'status_pengajuan' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function desa()
    {
        return $this->belongsTo(\App\Models\Desa::class, 'desa_id', '');
    }
}
