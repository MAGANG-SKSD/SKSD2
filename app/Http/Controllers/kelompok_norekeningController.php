<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createkelompok_norekeningRequest;
use App\Http\Requests\Updatekelompok_norekeningRequest;
use App\Repositories\kelompok_norekeningRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class kelompok_norekeningController extends AppBaseController
{
    /** @var kelompok_norekeningRepository $kelompokNorekeningRepository*/
    private $kelompokNorekeningRepository;

    public function __construct(kelompok_norekeningRepository $kelompokNorekeningRepo)
    {
        $this->kelompokNorekeningRepository = $kelompokNorekeningRepo;
    }

    /**
     * Display a listing of the kelompok_norekening.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kelompokNorekenings = $this->kelompokNorekeningRepository->paginate(10);

        return view('kelompok_norekenings.index')
            ->with('kelompokNorekenings', $kelompokNorekenings);
    }

    /**
     * Show the form for creating a new kelompok_norekening.
     *
     * @return Response
     */
    public function create()
    {
        return view('kelompok_norekenings.create');
    }

    /**
     * Store a newly created kelompok_norekening in storage.
     *
     * @param Createkelompok_norekeningRequest $request
     *
     * @return Response
     */
    public function store(Createkelompok_norekeningRequest $request)
    {
        $input = $request->all();

        $kelompokNorekening = $this->kelompokNorekeningRepository->create($input);

        Flash::success('Kelompok Norekening saved successfully.');

        return redirect(route('kelompokNorekenings.index'));
    }

    /**
     * Display the specified kelompok_norekening.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kelompokNorekening = $this->kelompokNorekeningRepository->find($id);

        if (empty($kelompokNorekening)) {
            Flash::error('Kelompok Norekening not found');

            return redirect(route('kelompokNorekenings.index'));
        }

        return view('kelompok_norekenings.show')->with('kelompokNorekening', $kelompokNorekening);
    }

    /**
     * Show the form for editing the specified kelompok_norekening.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kelompokNorekening = $this->kelompokNorekeningRepository->find($id);

        if (empty($kelompokNorekening)) {
            Flash::error('Kelompok Norekening not found');

            return redirect(route('kelompokNorekenings.index'));
        }

        return view('kelompok_norekenings.edit')->with('kelompokNorekening', $kelompokNorekening);
    }

    /**
     * Update the specified kelompok_norekening in storage.
     *
     * @param int $id
     * @param Updatekelompok_norekeningRequest $request
     *
     * @return Response
     */
    public function update($id, Updatekelompok_norekeningRequest $request)
    {
        $kelompokNorekening = $this->kelompokNorekeningRepository->find($id);

        if (empty($kelompokNorekening)) {
            Flash::error('Kelompok Norekening not found');

            return redirect(route('kelompokNorekenings.index'));
        }

        $kelompokNorekening = $this->kelompokNorekeningRepository->update($request->all(), $id);

        Flash::success('Kelompok Norekening updated successfully.');

        return redirect(route('kelompokNorekenings.index'));
    }

    /**
     * Remove the specified kelompok_norekening from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kelompokNorekening = $this->kelompokNorekeningRepository->find($id);

        if (empty($kelompokNorekening)) {
            Flash::error('Kelompok Norekening not found');

            return redirect(route('kelompokNorekenings.index'));
        }

        $this->kelompokNorekeningRepository->delete($id);

        Flash::success('Kelompok Norekening deleted successfully.');

        return redirect(route('kelompokNorekenings.index'));
    }
}
