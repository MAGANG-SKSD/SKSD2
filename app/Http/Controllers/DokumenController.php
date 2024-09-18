<?php

namespace App\Http\Controllers;

use App\DataTables\DokumenDataTable;
use App\Http\Requests\CreateDokumenRequest;
use App\Http\Requests\UpdateDokumenRequest;
use App\Repositories\DokumenRepository;
use Flash;
use Response;

class DokumenController extends AppBaseController
{
    /** @var DokumenRepository $dokumenRepository */
    private $dokumenRepository;

    public function __construct(DokumenRepository $dokumenRepo)
    {
        $this->dokumenRepository = $dokumenRepo;
    }

    /**
     * Display a listing of the Dokumen.
     *
     * @param DokumenDataTable $dokumenDataTable
     *
     * @return Response
     */
    public function index(DokumenDataTable $dokumenDataTable)
    {
        app()->setLocale('en'); // Set locale to English for Dokumen
        return $dokumenDataTable->render('dokumens.index');
    }

    /**
     * Show the form for creating a new Dokumen.
     *
     * @return Response
     */
    public function create()
    {
        app()->setLocale('en'); // Set locale to English for Dokumen
        return view('dokumens.create');
    }

    /**
     * Store a newly created Dokumen in storage.
     *
     * @param CreateDokumenRequest $request
     *
     * @return Response
     */
    public function store(CreateDokumenRequest $request)
    {
        app()->setLocale('en'); // Set locale to English for Dokumen
        $input = $request->all();

        $dokumen = $this->dokumenRepository->create($input);

        Flash::success(__('Dokumen saved successfully.'));

        return redirect(route('dokumens.index'));
    }

    /**
     * Display the specified Dokumen.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        app()->setLocale('en'); // Set locale to English for Dokumen
        $dokumen = $this->dokumenRepository->find($id);

        if (empty($dokumen)) {
            Flash::error(__('Dokumen not found'));

            return redirect(route('dokumens.index'));
        }

        return view('dokumens.show')->with('dokumen', $dokumen);
    }

    /**
     * Show the form for editing the specified Dokumen.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        app()->setLocale('en'); // Set locale to English for Dokumen
        $dokumen = $this->dokumenRepository->find($id);

        if (empty($dokumen)) {
            Flash::error(__('Dokumen not found'));

            return redirect(route('dokumens.index'));
        }

        return view('dokumens.edit')->with('dokumen', $dokumen);
    }

    /**
     * Update the specified Dokumen in storage.
     *
     * @param int $id
     * @param UpdateDokumenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDokumenRequest $request)
    {
        app()->setLocale('en'); // Set locale to English for Dokumen
        $dokumen = $this->dokumenRepository->find($id);

        if (empty($dokumen)) {
            Flash::error(__('Dokumen not found'));

            return redirect(route('dokumens.index'));
        }

        $dokumen = $this->dokumenRepository->update($request->all(), $id);

        Flash::success(__('Dokumen updated successfully.'));

        return redirect(route('dokumens.index'));
    }

    /**
     * Remove the specified Dokumen from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        app()->setLocale('en'); // Set locale to English for Dokumen
        $dokumen = $this->dokumenRepository->find($id);

        if (empty($dokumen)) {
            Flash::error(__('Dokumen not found'));

            return redirect(route('dokumens.index'));
        }

        $this->dokumenRepository->delete($id);

        Flash::success(__('Dokumen deleted successfully.'));

        return redirect(route('dokumens.index'));
    }
}
