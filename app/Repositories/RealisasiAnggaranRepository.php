<?php

namespace App\Repositories;

use App\Models\RealisasiAnggaran;
use App\Repositories\BaseRepository;

/**
 * Class RealisasiAnggaranRepository
 * @package App\Repositories
 * @version September 4, 2024, 2:42 pm WIB
*/

class RealisasiAnggaranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'desa_id',
        'tahun',
        'belanja_realisasi',
        'dana_tidak_terpakai',
        'laporan'
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
        return RealisasiAnggaran::class;
    }
}
