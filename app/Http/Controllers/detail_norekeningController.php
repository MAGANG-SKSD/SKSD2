<?php

namespace App\Http\Controllers;

use App\DataTables\detail_norekeningDataTable;
use App\Http\Requests;
use App\Http\Requests\Createdetail_norekeningRequest;
use App\Http\Requests\Updatedetail_norekeningRequest;
use App\Repositories\detail_norekeningRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class detail_norekeningController extends AppBaseController
{
    /** @var detail_norekeningRepository $detailNorekeningRepository*/
    private $detailNorekeningRepository;

    public function __construct(detail_norekeningRepository $detailNorekeningRepo)
    {
        $this->detailNorekeningRepository = $detailNorekeningRepo;
    }

    /**
     * Display a listing of the detail_norekening.
     *
     * @param detail_norekeningDataTable $detailNorekeningDataTable
     *
     * @return Response
     */
    public function index(detail_norekeningDataTable $detailNorekeningDataTable)
    {
        return $detailNorekeningDataTable->render('detail_norekenings.index');
    }

    /**
     * Show the form for creating a new detail_norekening.
     *
     * @return Response
     */
    public function create()
    {
        return view('detail_norekenings.create');
    }

    /**
     * Store a newly created detail_norekening in storage.
     *
     * @param Createdetail_norekeningRequest $request
     *
     * @return Response
     */
    public function store(Createdetail_norekeningRequest $request)
    {
        $input = $request->all();

        $detailNorekening = $this->detailNorekeningRepository->create($input);

        Flash::success('Detail Norekening saved successfully.');

        return redirect(route('detailNorekenings.index'));
    }

    /**
     * Display the specified detail_norekening.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailNorekening = $this->detailNorekeningRepository->find($id);

        if (empty($detailNorekening)) {
            Flash::error('Detail Norekening not found');

            return redirect(route('detailNorekenings.index'));
        }

        return view('detail_norekenings.show')->with('detailNorekening', $detailNorekening);
    }

    /**
     * Show the form for editing the specified detail_norekening.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detailNorekening = $this->detailNorekeningRepository->find($id);

        if (empty($detailNorekening)) {
            Flash::error('Detail Norekening not found');

            return redirect(route('detailNorekenings.index'));
        }

        return view('detail_norekenings.edit')->with('detailNorekening', $detailNorekening);
    }

    /**
     * Update the specified detail_norekening in storage.
     *
     * @param int $id
     * @param Updatedetail_norekeningRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedetail_norekeningRequest $request)
    {
        $detailNorekening = $this->detailNorekeningRepository->find($id);

        if (empty($detailNorekening)) {
            Flash::error('Detail Norekening not found');

            return redirect(route('detailNorekenings.index'));
        }

        $detailNorekening = $this->detailNorekeningRepository->update($request->all(), $id);

        Flash::success('Detail Norekening updated successfully.');

        return redirect(route('detailNorekenings.index'));
    }

    /**
     * Remove the specified detail_norekening from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailNorekening = $this->detailNorekeningRepository->find($id);

        if (empty($detailNorekening)) {
            Flash::error('Detail Norekening not found');

            return redirect(route('detailNorekenings.index'));
        }

        $this->detailNorekeningRepository->delete($id);

        Flash::success('Detail Norekening deleted successfully.');

        return redirect(route('detailNorekenings.index'));
    }
}
