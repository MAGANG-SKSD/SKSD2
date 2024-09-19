<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class detail_norekening
 * @package App\Models
 * @version September 11, 2024, 2:05 pm WIB
 *
 * @property \App\Models\klasifikasi_norekening $id
 * @property \App\Models\jenis_norekening $id
 * @property \App\Models\kelompok_norekening $id
 * @property string $nama
 * @property integer $id_klasifikasi_norekening
 * @property integer $id_jenis_norekening
 * @property integer $id_kelompok_norekening
 */
class detail_norekening extends Model
{


    public $table = 'detail_norekening';
    



    public $fillable = [
        'nama',
        'id_klasifikasi_norekening',
        'id_jenis_norekening',
        'id_kelompok_norekening'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'id_klasifikasi_norekening' => 'integer',
        'id_jenis_norekening' => 'integer',
        'id_kelompok_norekening' => 'integer'
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
        return $this->belongsTo(\App\Models\klasifikasi_norekening::class, 'id', 'id_klasifikasi_norekening');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function id()
    {
        return $this->belongsTo(\App\Models\jenis_norekening::class, 'id', 'id_jenis_norekening');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function id()
    {
        return $this->belongsTo(\App\Models\kelompok_norekening::class, 'id', 'id_kelompok_norekening');
    }
}
