<?php

namespace App\Repositories;

use App\Models\jenis_norekening;
use App\Repositories\BaseRepository;

/**
 * Class jenis_norekeningRepository
 * @package App\Repositories
 * @version September 11, 2024, 1:56 pm WIB
*/

class jenis_norekeningRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'id_klasifikasi_blanaja'
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
        return jenis_norekening::class;
    }
}
