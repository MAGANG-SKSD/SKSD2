<?php

namespace App\Repositories;

use App\Models\Sp2d;
use App\Repositories\BaseRepository;

/**
 * Class Sp2dRepository
 * @package App\Repositories
 * @version September 4, 2024, 2:42 pm WIB
*/

class Sp2dRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'desa_id',
        'nomor_sp2d',
        'tanggal_sp2d',
        'jumlah_dana'
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
        return Sp2d::class;
    }
}
