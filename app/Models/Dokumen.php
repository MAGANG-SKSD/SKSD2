<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Dokumen
 * @package App\Models
 * @version September 4, 2024, 2:41 pm WIB
 *
 * @property \App\Models\Dana $dana
 * @property integer $dana_id
 * @property string $jenis_dokumen
 * @property string $file_path
 * @property string $status_verifikasi
 */
class Dokumen extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'dokumens';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'dokumen_id';

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
        'jenis_dokumen' => 'required',
        'file_path' => 'required',
        'status_verifikasi' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dana()
    {
        return $this->belongsTo(\App\Models\Dana::class, 'dana_id', '');
    }
}
