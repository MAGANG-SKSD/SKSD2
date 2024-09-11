<?php

namespace App\Repositories;

use App\Models\Dana;
use App\Repositories\BaseRepository;

/**
 * Class DanaRepository
 * @package App\Repositories
 * @version September 4, 2024, 2:40 pm WIB
*/

class DanaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'desa_id',
        'jenis_dana',
        'jumlah_dana',
        'status_pengajuan'
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
        return Dana::class;
    }
}
