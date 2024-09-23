<?php

namespace App\Repositories;

use App\Models\Apbdes;
use App\Repositories\BaseRepository;

/**
 * Class ApbdesRepository
 * @package App\Repositories
 * @version September 4, 2024, 2:37 pm WIB
*/

class ApbdesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'desa_id',
        'tahun',
        'pendapatan',
        'belanja',
        'pembiayaan',
        'status_verifikasi'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Apbdes::class;
    }
}
