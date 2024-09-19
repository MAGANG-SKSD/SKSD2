<?php

namespace App\Http\Controllers;

use App\DataTables\jenis_norekeningDataTable;
use App\Http\Requests;
use App\Http\Requests\Createjenis_norekeningRequest;
use App\Http\Requests\Updatejenis_norekeningRequest;
use App\Repositories\jenis_norekeningRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class jenis_norekeningController extends AppBaseController
{
    /** @var jenis_norekeningRepository $jenisNorekeningRepository*/
    private $jenisNorekeningRepository;

    public function __construct(jenis_norekeningRepository $jenisNorekeningRepo)
    {
        $this->jenisNorekeningRepository = $jenisNorekeningRepo;
    }

    /**
     * Display a listing of the jenis_norekening.
     *
     * @param jenis_norekeningDataTable $jenisNorekeningDataTable
     *
     * @return Response
     */
    public function index(jenis_norekeningDataTable $jenisNorekeningDataTable)
    {
        return $jenisNorekeningDataTable->render('jenis_norekenings.index');
    }

    /**
     * Show the form for creating a new jenis_norekening.
     *
     * @return Response
     */
    public function create()
    {
        return view('jenis_norekenings.create');
    }

    /**
     * Store a newly created jenis_norekening in storage.
     *
     * @param Createjenis_norekeningRequest $request
     *
     * @return Response
     */
    public function store(Createjenis_norekeningRequest $request)
    {
        $input = $request->all();

        $jenisNorekening = $this->jenisNorekeningRepository->create($input);

        Flash::success('Jenis Norekening saved successfully.');

        return redirect(route('jenisNorekenings.index'));
    }

    /**
     * Display the specified jenis_norekening.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenisNorekening = $this->jenisNorekeningRepository->find($id);

        if (empty($jenisNorekening)) {
            Flash::error('Jenis Norekening not found');

            return redirect(route('jenisNorekenings.index'));
        }

        return view('jenis_norekenings.show')->with('jenisNorekening', $jenisNorekening);
    }

    /**
     * Show the form for editing the specified jenis_norekening.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenisNorekening = $this->jenisNorekeningRepository->find($id);

        if (empty($jenisNorekening)) {
            Flash::error('Jenis Norekening not found');

            return redirect(route('jenisNorekenings.index'));
        }

        return view('jenis_norekenings.edit')->with('jenisNorekening', $jenisNorekening);
    }

    /**
     * Update the specified jenis_norekening in storage.
     *
     * @param int $id
     * @param Updatejenis_norekeningRequest $request
     *
     * @return Response
     */
    public function update($id, Updatejenis_norekeningRequest $request)
    {
        $jenisNorekening = $this->jenisNorekeningRepository->find($id);

        if (empty($jenisNorekening)) {
            Flash::error('Jenis Norekening not found');

            return redirect(route('jenisNorekenings.index'));
        }

        $jenisNorekening = $this->jenisNorekeningRepository->update($request->all(), $id);

        Flash::success('Jenis Norekening updated successfully.');

        return redirect(route('jenisNorekenings.index'));
    }

    /**
     * Remove the specified jenis_norekening from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenisNorekening = $this->jenisNorekeningRepository->find($id);

        if (empty($jenisNorekening)) {
            Flash::error('Jenis Norekening not found');

            return redirect(route('jenisNorekenings.index'));
        }

        $this->jenisNorekeningRepository->delete($id);

        Flash::success('Jenis Norekening deleted successfully.');

        return redirect(route('jenisNorekenings.index'));
    }
}
