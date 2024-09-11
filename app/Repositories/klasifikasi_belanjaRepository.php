<?php

namespace App\Repositories;

use App\Models\klasifikasi_belanja;
use App\Repositories\BaseRepository;

/**
 * Class klasifikasi_belanjaRepository
 * @package App\Repositories
 * @version September 10, 2024, 2:38 pm WIB
*/

class klasifikasi_belanjaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
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
        return klasifikasi_belanja::class;
    }
}
