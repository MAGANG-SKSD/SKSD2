<?php

namespace App\Http\Controllers;

use App\DataTables\klasifikasi_belanjaDataTable;
use App\Http\Requests;
use App\Http\Requests\Createklasifikasi_belanjaRequest;
use App\Http\Requests\Updateklasifikasi_belanjaRequest;
use App\Repositories\klasifikasi_belanjaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class klasifikasi_belanjaController extends AppBaseController
{
    /** @var klasifikasi_belanjaRepository $klasifikasiBelanjaRepository*/
    private $klasifikasiBelanjaRepository;

    public function __construct(klasifikasi_belanjaRepository $klasifikasiBelanjaRepo)
    {
        $this->klasifikasiBelanjaRepository = $klasifikasiBelanjaRepo;
    }

    /**
     * Display a listing of the klasifikasi_belanja.
     *
     * @param klasifikasi_belanjaDataTable $klasifikasiBelanjaDataTable
     *
     * @return Response
     */
    public function index(klasifikasi_belanjaDataTable $klasifikasiBelanjaDataTable)
    {
        return $klasifikasiBelanjaDataTable->render('klasifikasi_belanjas.index');
    }

    /**
     * Show the form for creating a new klasifikasi_belanja.
     *
     * @return Response
     */
    public function create()
    {
        return view('klasifikasi_belanjas.create');
    }

    /**
     * Store a newly created klasifikasi_belanja in storage.
     *
     * @param Createklasifikasi_belanjaRequest $request
     *
     * @return Response
     */
    public function store(Createklasifikasi_belanjaRequest $request)
    {
        $input = $request->all();

        $klasifikasiBelanja = $this->klasifikasiBelanjaRepository->create($input);

        Flash::success('Klasifikasi Belanja saved successfully.');

        return redirect(route('klasifikasiBelanjas.index'));
    }

    /**
     * Display the specified klasifikasi_belanja.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $klasifikasiBelanja = $this->klasifikasiBelanjaRepository->find($id);

        if (empty($klasifikasiBelanja)) {
            Flash::error('Klasifikasi Belanja not found');

            return redirect(route('klasifikasiBelanjas.index'));
        }

        return view('klasifikasi_belanjas.show')->with('klasifikasiBelanja', $klasifikasiBelanja);
    }

    /**
     * Show the form for editing the specified klasifikasi_belanja.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $klasifikasiBelanja = $this->klasifikasiBelanjaRepository->find($id);

        if (empty($klasifikasiBelanja)) {
            Flash::error('Klasifikasi Belanja not found');

            return redirect(route('klasifikasiBelanjas.index'));
        }

        return view('klasifikasi_belanjas.edit')->with('klasifikasiBelanja', $klasifikasiBelanja);
    }

    /**
     * Update the specified klasifikasi_belanja in storage.
     *
     * @param int $id
     * @param Updateklasifikasi_belanjaRequest $request
     *
     * @return Response
     */
    public function update($id, Updateklasifikasi_belanjaRequest $request)
    {
        $klasifikasiBelanja = $this->klasifikasiBelanjaRepository->find($id);

        if (empty($klasifikasiBelanja)) {
            Flash::error('Klasifikasi Belanja not found');

            return redirect(route('klasifikasiBelanjas.index'));
        }

        $klasifikasiBelanja = $this->klasifikasiBelanjaRepository->update($request->all(), $id);

        Flash::success('Klasifikasi Belanja updated successfully.');

        return redirect(route('klasifikasiBelanjas.index'));
    }

    /**
     * Remove the specified klasifikasi_belanja from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $klasifikasiBelanja = $this->klasifikasiBelanjaRepository->find($id);

        if (empty($klasifikasiBelanja)) {
            Flash::error('Klasifikasi Belanja not found');

            return redirect(route('klasifikasiBelanjas.index'));
        }

        $this->klasifikasiBelanjaRepository->delete($id);

        Flash::success('Klasifikasi Belanja deleted successfully.');

        return redirect(route('klasifikasiBelanjas.index'));
    }
}
