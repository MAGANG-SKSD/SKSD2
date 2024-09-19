<?php

namespace App\Http\Controllers;

use App\DataTables\Sp2dDataTable;
use App\Http\Requests\CreateSp2dRequest;
use App\Http\Requests\UpdateSp2dRequest;
use App\Repositories\Sp2dRepository;
use Flash;
use Response;

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
}
