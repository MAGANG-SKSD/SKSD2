<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class kelompok_norekening
 * @package App\Models
 * @version September 11, 2024, 1:52 pm WIB
 *
 * @property \App\Models\klasifikasi_belanja $id
 * @property string $nama
 * @property integer $id_klasifikasi_belanja
 */
class kelompok_norekening extends Model
{


    public $table = 'kelompok_norekening';
    



    public $fillable = [
        'nama',
        'id_klasifikasi_belanja'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'id_klasifikasi_belanja' => 'integer'
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
    public function id()
    {
        return $this->belongsTo(\App\Models\klasifikasi_belanja::class, 'id', 'id_klasifikasi_belanja');
    }
}
