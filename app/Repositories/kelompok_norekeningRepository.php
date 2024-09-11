<?php

namespace App\Repositories;

use App\Models\kelompok_norekening;
use App\Repositories\BaseRepository;

/**
 * Class kelompok_norekeningRepository
 * @package App\Repositories
 * @version September 11, 2024, 1:52 pm WIB
*/

class kelompok_norekeningRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'id_klasifikasi_belanja'
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
        return kelompok_norekening::class;
    }
}
