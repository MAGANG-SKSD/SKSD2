<?php

namespace App\Repositories;

use App\Models\detail_norekening;
use App\Repositories\BaseRepository;

/**
 * Class detail_norekeningRepository
 * @package App\Repositories
 * @version September 11, 2024, 2:05 pm WIB
*/

class detail_norekeningRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'id_klasifikasi_norekening',
        'id_jenis_norekening',
        'id_kelompok_norekening'
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
        return detail_norekening::class;
    }
}
