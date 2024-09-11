<?php

namespace App\Repositories;

use App\Models\Desa;
use App\Repositories\BaseRepository;

/**
 * Class DesaRepository
 * @package App\Repositories
 * @version September 4, 2024, 2:41 pm WIB
*/

class DesaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_desa',
        'alamat_desa',
        'kode_pos',
        'telepon',
        'email'
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
        return Desa::class;
    }
}
