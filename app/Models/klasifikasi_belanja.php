<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class klasifikasi_belanja
 * @package App\Models
 * @version September 10, 2024, 2:38 pm WIB
 *
 * @property string $nama
 */
class klasifikasi_belanja extends Model
{


    public $table = 'klasifikasi_belanja';
    



    public $fillable = [
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
