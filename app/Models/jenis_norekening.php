<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class jenis_norekening
 * @package App\Models
 * @version September 11, 2024, 1:56 pm WIB
 *
 * @property \App\Models\klasifikasi_blanaja $id
 * @property string $nama
 * @property integer $id_klasifikasi_blanaja
 */
class jenis_norekening extends Model
{


    public $table = 'jenis_norekening';
    



    public $fillable = [
        'nama',
        'id_klasifikasi_blanaja'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'id_klasifikasi_blanaja' => 'integer'
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
        return $this->belongsTo(\App\Models\klasifikasi_blanaja::class, 'id', 'id_klasifikasi_blanaja');
    }
}
