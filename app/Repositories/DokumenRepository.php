<?php

namespace App\Repositories;

use App\Models\Dokumen;
use App\Repositories\BaseRepository;

/**
 * Class DokumenRepository
 * @package App\Repositories
 * @version September 4, 2024, 2:41 pm WIB
*/

class DokumenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dana_id',
        'jenis_dokumen',
        'file_path',
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
        return Dokumen::class;
    }
}
