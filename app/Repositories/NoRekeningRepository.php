<?php

namespace App\Repositories;

use App\Models\NoRekening;
use App\Repositories\BaseRepository;

/**
 * Class NoRekeningRepository
 * @package App\Repositories
 * @version September 4, 2024, 2:41 pm WIB
*/

class NoRekeningRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'desa_id',
        'kode_rekening',
        'uraian'
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
        return NoRekening::class;
    }
}
