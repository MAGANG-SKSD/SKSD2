<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Sp2d
 * @package App\Models
 * @version September 4, 2024, 2:42 pm WIB
 *
 * @property \App\Models\Desa $desa
 * @property integer $desa_id
 * @property integer $nomor_sp2d
 * @property string $tanggal_sp2d
 * @property integer $jumlah_dana
 * @property string $laporan
 * @property string $rekomendasi
 * @property string $surat_pengantar
 * @property string $lembaran_desa
 * @property string $berita_desa
 * @property string $berita_acara
 * @property string $notulen
 * @property string $daftar_hadir_pertemuan
 * @property string $daftar_hadir
 */
class Sp2d extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'sp2ds';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'sp2d_id';

    public $fillable = [
        'desa_id',
        'nomor_sp2d',
        'tanggal_sp2d',
        'jumlah_dana',
        'laporan',
        'rekomendasi',
        'surat_pengantar',
        'lembaran_desa',
        'berita_desa',
        'berita_acara',
        'notulen',
        'daftar_hadir_pertemuan',
        'daftar_hadir'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sp2d_id' => 'integer',
        'desa_id' => 'integer',
        'nomor_sp2d' => 'integer',
        'tanggal_sp2d' => 'date',
        'jumlah_dana' => 'integer',
        'laporan' => 'string',
        'rekomendasi' => 'string',
        'surat_pengantar' => 'string',
        'lembaran_desa' => 'string',
        'berita_desa' => 'string',
        'berita_acara' => 'string',
        'notulen' => 'string',
        'daftar_hadir_pertemuan' => 'string',
        'daftar_hadir' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor_sp2d' => 'required',
        'tanggal_sp2d' => 'required',
        'jumlah_dana' => 'required',
        'laporan' => 'required|string|max:255',
        'rekomendasi' => 'required|string|max:255',
        'surat_pengantar' => 'required|string|max:255',
        'lembaran_desa' => 'required|string|max:255',
        'berita_desa' => 'required|string|max:255',
        'berita_acara' => 'required|string|max:255',
        'notulen' => 'required|string|max:255',
        'daftar_hadir_pertemuan' => 'required|string|max:255',
        'daftar_hadir' => 'required|string|max:255',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function desa()
    {
        return $this->belongsTo(\App\Models\Desa::class, 'desa_id', '');
    }
}
