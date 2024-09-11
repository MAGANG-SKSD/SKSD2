<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createkelompok_norekeningAPIRequest;
use App\Http\Requests\API\Updatekelompok_norekeningAPIRequest;
use App\Models\kelompok_norekening;
use App\Repositories\kelompok_norekeningRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class kelompok_norekeningController
 * @package App\Http\Controllers\API
 */

class kelompok_norekeningAPIController extends AppBaseController
{
    /** @var  kelompok_norekeningRepository */
    private $kelompokNorekeningRepository;

    public function __construct(kelompok_norekeningRepository $kelompokNorekeningRepo)
    {
        $this->kelompokNorekeningRepository = $kelompokNorekeningRepo;
    }

    /**
     * Display a listing of the kelompok_norekening.
     * GET|HEAD /kelompokNorekenings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kelompokNorekenings = $this->kelompokNorekeningRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kelompokNorekenings->toArray(), 'Kelompok Norekenings retrieved successfully');
    }

    /**
     * Store a newly created kelompok_norekening in storage.
     * POST /kelompokNorekenings
     *
     * @param Createkelompok_norekeningAPIRequest $request
     *
     * @return Response
     */
    public function store(Createkelompok_norekeningAPIRequest $request)
    {
        $input = $request->all();

        $kelompokNorekening = $this->kelompokNorekeningRepository->create($input);

        return $this->sendResponse($kelompokNorekening->toArray(), 'Kelompok Norekening saved successfully');
    }

    /**
     * Display the specified kelompok_norekening.
     * GET|HEAD /kelompokNorekenings/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var kelompok_norekening $kelompokNorekening */
        $kelompokNorekening = $this->kelompokNorekeningRepository->find($id);

        if (empty($kelompokNorekening)) {
            return $this->sendError('Kelompok Norekening not found');
        }

        return $this->sendResponse($kelompokNorekening->toArray(), 'Kelompok Norekening retrieved successfully');
    }

    /**
     * Update the specified kelompok_norekening in storage.
     * PUT/PATCH /kelompokNorekenings/{id}
     *
     * @param int $id
     * @param Updatekelompok_norekeningAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatekelompok_norekeningAPIRequest $request)
    {
        $input = $request->all();

        /** @var kelompok_norekening $kelompokNorekening */
        $kelompokNorekening = $this->kelompokNorekeningRepository->find($id);

        if (empty($kelompokNorekening)) {
            return $this->sendError('Kelompok Norekening not found');
        }

        $kelompokNorekening = $this->kelompokNorekeningRepository->update($input, $id);

        return $this->sendResponse($kelompokNorekening->toArray(), 'kelompok_norekening updated successfully');
    }

    /**
     * Remove the specified kelompok_norekening from storage.
     * DELETE /kelompokNorekenings/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var kelompok_norekening $kelompokNorekening */
        $kelompokNorekening = $this->kelompokNorekeningRepository->find($id);

        if (empty($kelompokNorekening)) {
            return $this->sendError('Kelompok Norekening not found');
        }

        $kelompokNorekening->delete();

        return $this->sendSuccess('Kelompok Norekening deleted successfully');
    }
}
