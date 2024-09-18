<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Dokumen
 * @package App\Models
 * @version September 13, 2024, 9:28 am WIB
 *
 * @property \App\Models\dana_id $dana
 * @property integer $dana_id
 * @property string $jenis_dokumen
 * @property string $file_path
 * @property string $status_verifikasi
 */
class Dokumen extends Model
{
    use SoftDeletes;


    public $table = 'dokumen';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'dana_id',
        'jenis_dokumen',
        'file_path',
        'status_verifikasi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'dokumen_id' => 'integer',
        'dana_id' => 'integer',
        'jenis_dokumen' => 'string',
        'file_path' => 'string',
        'status_verifikasi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dana()
    {
        return $this->belongsTo(\App\Models\dana_id::class, 'dana_id', '');
    }
}
