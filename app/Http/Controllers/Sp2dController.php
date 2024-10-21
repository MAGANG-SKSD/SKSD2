<?php

namespace App\Http\Controllers;

use App\DataTables\Sp2dDataTable;
use App\Http\Requests\CreateSp2dRequest;
use App\Http\Requests\UpdateSp2dRequest;
use App\Repositories\Sp2dRepository;
use Flash;
use Response;
use Illuminate\Http\Request;
use PDF; // Pastikan Anda sudah menginstal PDF
use Illuminate\Support\Facades\View;

class Sp2dController extends AppBaseController
{
    /** @var Sp2dRepository $sp2dRepository */
    private $sp2dRepository;

    public function __construct(Sp2dRepository $sp2dRepo)
    {
        $this->sp2dRepository = $sp2dRepo;
    }

    /**
     * Display a listing of the Sp2d.
     *
     * @param Sp2dDataTable $sp2dDataTable
     *
     * @return Response
     */
    public function index(Sp2dDataTable $sp2dDataTable)
    {
        app()->setLocale('en'); // Set locale to English for Sp2d
        return $sp2dDataTable->render('sp2ds.index');
    }

    /**
     * Show the form for creating a new Sp2d.
     *
     * @return Response
     */
    public function create()
    {
        app()->setLocale('en'); // Set locale to English for Sp2d
        return view('sp2ds.create');
    }

    /**
     * Store a newly created Sp2d in storage.
     *
     * @param CreateSp2dRequest $request
     *
     * @return Response
     */
    public function store(CreateSp2dRequest $request)
    {
        app()->setLocale('en'); // Set locale to English for Sp2d
        $input = $request->all();

        // Tambahkan field baru ke input
        $sp2d = $this->sp2dRepository->create($input);

        Flash::success(__('Sp2d saved successfully.'));

        return redirect(route('sp2ds.index'));
    }

    /**
     * Display the specified Sp2d.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        app()->setLocale('en'); // Set locale to English for Sp2d
        $sp2d = $this->sp2dRepository->find($id);

        if (empty($sp2d)) {
            Flash::error(__('Sp2d not found'));

            return redirect(route('sp2ds.index'));
        }

        return view('sp2ds.show')->with('sp2d', $sp2d);
    }

    /**
     * Show the form for editing the specified Sp2d.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        app()->setLocale('en'); // Set locale to English for Sp2d
        $sp2d = $this->sp2dRepository->find($id);

        if (empty($sp2d)) {
            Flash::error(__('Sp2d not found'));

            return redirect(route('sp2ds.index'));
        }

        return view('sp2ds.edit')->with('sp2d', $sp2d);
    }

    /**
     * Update the specified Sp2d in storage.
     *
     * @param int $id
     * @param UpdateSp2dRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSp2dRequest $request)
    {
        app()->setLocale('en'); // Set locale to English for Sp2d
        $sp2d = $this->sp2dRepository->find($id);

        if (empty($sp2d)) {
            Flash::error(__('Sp2d not found'));

            return redirect(route('sp2ds.index'));
        }

        // Tambahkan field baru ke input
        $sp2d = $this->sp2dRepository->update($request->all(), $id);

        Flash::success(__('Sp2d updated successfully.'));

        return redirect(route('sp2ds.index'));
    }

    /**
     * Remove the specified Sp2d from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        app()->setLocale('en'); // Set locale to English for Sp2d
        $sp2d = $this->sp2dRepository->find($id);

        if (empty($sp2d)) {
            Flash::error(__('Sp2d not found'));

            return redirect(route('sp2ds.index'));
        }

        $this->sp2dRepository->delete($id);

        Flash::success(__('Sp2d deleted successfully.'));

        return redirect(route('sp2ds.index'));
    }

    
    // Halaman Tambahan Sesuai Tombol
    public function surat()
    {
        return view('sp2ds.surat');
    }

    public function beritaAcara()
    {
        $hari = "Senin";
        $tanggal = "21";
        $bulan = "Oktober";
        $tahun = "2024";
        $lokasi = "Kota ABC";
        $tanggal_pembuatan = "21 Oktober 2024";
        
        // Contoh data pejabat
        $pejabat1 = [
            'nama' => 'John Doe',
            'jabatan' => 'Kepala Bagian Keuangan',
            'instansi' => 'Dinas Keuangan Kota ABC'
        ];
    
        $pejabat2 = [
            'nama' => 'Jane Doe',
            'jabatan' => 'Kepala Bagian Anggaran',
            'instansi' => 'Dinas Anggaran Kota ABC'
        ];
    
        // Data contoh untuk pendapatan, belanja, dan SP2D
        $pendapatan = [
            (object)['jenis' => 'Pajak Daerah', 'anggaran' => 500000000, 'realisasi' => 450000000],
            (object)['jenis' => 'Retribusi', 'anggaran' => 200000000, 'realisasi' => 180000000]
        ];
    
        $belanja = [
            (object)['jenis' => 'Infrastruktur', 'anggaran' => 600000000, 'realisasi' => 550000000],
            (object)['jenis' => 'Operasional', 'anggaran' => 300000000, 'realisasi' => 290000000]
        ];
    
        // Contoh data laporan SKPD
        $laporan_skpd = [
            (object)[
                'bulan' => 'Oktober', 
                'nama_skpd' => 'Dinas Pendidikan', 
                'jumlah_anggaran' => 1500000000, 
                'jumlah_realisasi' => 1400000000,
                'realisasi_sp2d' => 1350000000,
                'realisasi_spj' => 1300000000,
                'saldo_kas' => 50000000,
                'sp2d_minus_spj' => 50000000,
                'lap_fungsional' => 15000000
            ],
            (object)[
                'bulan' => 'Oktober', 
                'nama_skpd' => 'Dinas Kesehatan', 
                'jumlah_anggaran' => 1200000000, 
                'jumlah_realisasi' => 1100000000,
                'realisasi_sp2d' => 1050000000,
                'realisasi_spj' => 1000000000,
                'saldo_kas' => 50000000,
                'sp2d_minus_spj' => 50000000,
                'lap_fungsional' => 10000000
            ]
        ];
    
        // Data untuk Catatan Seksi Akuntansi
        $catatan_seksi = [
            (object)['bulan' => 'Oktober', 'realisasi_sp2d' => 1350000000],
            (object)['bulan' => 'Oktober', 'realisasi_sp2d' => 1050000000]
        ];
    
        return view('sp2ds.berita_acara', compact(
            'hari', 'tanggal', 'bulan', 'tahun', 
            'lokasi', 'tanggal_pembuatan', 'pejabat1', 'pejabat2', 
            'pendapatan', 'belanja', 'laporan_skpd', 'catatan_seksi'
        ));
    }

    public function download()
    {
        $hari = "Senin";
        $tanggal = "21";
        $bulan = "Oktober";
        $tahun = "2024";
        $lokasi = "Kota ABC";
        $tanggal_pembuatan = "21 Oktober 2024";

        // Contoh data pejabat
        $pejabat1 = [
            'nama' => 'John Doe',
            'jabatan' => 'Kepala Bagian Keuangan',
            'instansi' => 'Dinas Keuangan Kota ABC'
        ];

        $pejabat2 = [
            'nama' => 'Jane Doe',
            'jabatan' => 'Kepala Bagian Anggaran',
            'instansi' => 'Dinas Anggaran Kota ABC'
        ];

        // Data contoh untuk pendapatan dan belanja
        $pendapatan = [
            (object)['jenis' => 'Pajak Daerah', 'anggaran' => 500000000, 'realisasi' => 450000000],
            (object)['jenis' => 'Retribusi', 'anggaran' => 200000000, 'realisasi' => 180000000]
        ];

        $belanja = [
            (object)['jenis' => 'Infrastruktur', 'anggaran' => 600000000, 'realisasi' => 550000000],
            (object)['jenis' => 'Operasional', 'anggaran' => 300000000, 'realisasi' => 290000000]
        ];

        // Contoh data laporan SKPD
        $laporan_skpd = [
            (object)[
                'bulan' => 'Oktober', 
                'nama_skpd' => 'Dinas Pendidikan', 
                'jumlah_anggaran' => 1500000000, 
                'jumlah_realisasi' => 1400000000,
                'realisasi_sp2d' => 1350000000,
                'realisasi_spj' => 1300000000,
                'saldo_kas' => 50000000,
                'sp2d_minus_spj' => 50000000,
                'lap_fungsional' => 15000000
            ],
            (object)[
                'bulan' => 'Oktober', 
                'nama_skpd' => 'Dinas Kesehatan', 
                'jumlah_anggaran' => 1200000000, 
                'jumlah_realisasi' => 1100000000,
                'realisasi_sp2d' => 1050000000,
                'realisasi_spj' => 1000000000,
                'saldo_kas' => 50000000,
                'sp2d_minus_spj' => 50000000,
                'lap_fungsional' => 10000000
            ]
        ];

        // Data untuk Catatan Seksi Akuntansi
        $catatan_seksi = [
            (object)['bulan' => 'Oktober', 'realisasi_sp2d' => 1350000000],
            (object)['bulan' => 'Oktober', 'realisasi_sp2d' => 1050000000]
        ];

        // Membuat PDF
        $pdf = PDF::loadView('sp2ds.template_berita_acara', compact(
            'hari', 'tanggal', 'bulan', 'tahun', 
            'lokasi', 'tanggal_pembuatan', 'pejabat1', 'pejabat2', 
            'pendapatan', 'belanja', 'laporan_skpd', 'catatan_seksi'
        ));

        // Mengunduh file PDF
        return $pdf->download('berita_acara_rekonsiliasi.pdf');
    }


    
    



    public function beritaDesa()
    {
        return view('sp2ds.berita_desa');
    }

    public function laporan()
    {
        return view('sp2ds.laporan');
    }

    public function lembaranDesa()
    {
        return view('sp2ds.lembaran_desa');
    }

    public function notulen()
    {
        return view('sp2ds.notulen');
    }

    public function rekomendasi()
    {
        return view('sp2ds.rekomendasi');
    }

    public function suratPengantar()
    {
        return view('sp2ds.surat_pengantar');
    }
   
}
