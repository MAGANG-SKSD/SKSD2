<?php

namespace App\Repositories;

use App\Models\AnggaranKas;
use App\Repositories\BaseRepository;

/**
 * Class AnggaranKasRepository
 * @package App\Repositories
 * @version September 4, 2024, 2:36 pm WIB
*/

class AnggaranKasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'desa_id',
        'tahun',
        'total_anggaran',
        'status persetujuan'
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
        return AnggaranKas::class;
    }
}
