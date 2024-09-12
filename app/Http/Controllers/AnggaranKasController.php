<?php

namespace App\Http\Controllers;

use App\DataTables\AnggaranKasDataTable;
use App\Http\Requests\CreateAnggaranKasRequest;
use App\Http\Requests\UpdateAnggaranKasRequest;
use App\Repositories\AnggaranKasRepository;
use Flash;
use Response;

class AnggaranKasController extends AppBaseController
{
    /** @var AnggaranKasRepository $anggaranKasRepository */
    private $anggaranKasRepository;

    public function __construct(AnggaranKasRepository $anggaranKasRepo)
    {
        $this->anggaranKasRepository = $anggaranKasRepo;
    }

    /**
     * Display a listing of the AnggaranKas.
     *
     * @param AnggaranKasDataTable $anggaranKasDataTable
     *
     * @return Response
     */
    public function index(AnggaranKasDataTable $anggaranKasDataTable)
    {
        return $anggaranKasDataTable->render('anggaran-kas.index');
    }

    /**
     * Show the form for creating a new AnggaranKas.
     *
     * @return Response
     */
    public function create()
    {
        return view('anggaran-kas.create');
    }

    /**
     * Store a newly created AnggaranKas in storage.
     *
     * @param CreateAnggaranKasRequest $request
     *
     * @return Response
     */
    public function store(CreateAnggaranKasRequest $request)
    {
        $input = $request->all();

        $anggaranKas = $this->anggaranKasRepository->create($input);

        Flash::success('Anggaran Kas saved successfully.');

        return redirect(route('anggaranKas.index'));
    }

    /**
     * Display the specified AnggaranKas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anggaranKas = $this->anggaranKasRepository->find($id);

        if (empty($anggaranKas)) {
            Flash::error('Anggaran Kas not found');

            return redirect(route('anggaranKas.index'));
        }

        return view('anggaran-kas.show')->with('anggaranKas', $anggaranKas);
    }

    /**
     * Show the form for editing the specified AnggaranKas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anggaranKas = $this->anggaranKasRepository->find($id);

        if (empty($anggaranKas)) {
            Flash::error('Anggaran Kas not found');

            return redirect(route('anggaranKas.index'));
        }

        return view('anggaran-kas.edit')->with('anggaranKas', $anggaranKas);
    }

    /**
     * Update the specified AnggaranKas in storage.
     *
     * @param int $id
     * @param UpdateAnggaranKasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnggaranKasRequest $request)
    {
        $anggaranKas = $this->anggaranKasRepository->find($id);

        if (empty($anggaranKas)) {
            Flash::error('Anggaran Kas not found');

            return redirect(route('anggaranKas.index'));
        }

        $anggaranKas = $this->anggaranKasRepository->update($request->all(), $id);

        Flash::success('Anggaran Kas updated successfully.');

        return redirect(route('anggaranKas.index'));
    }

    /**
     * Remove the specified AnggaranKas from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anggaranKas = $this->anggaranKasRepository->find($id);

        if (empty($anggaranKas)) {
            Flash::error('Anggaran Kas not found');

            return redirect(route('anggaranKas.index'));
        }

        $this->anggaranKasRepository->delete($id);

        Flash::success('Anggaran Kas deleted successfully.');

        return redirect(route('anggaranKas.index'));
    }
}
