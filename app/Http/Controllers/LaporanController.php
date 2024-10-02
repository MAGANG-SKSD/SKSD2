<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLaporanRequest; // Buat request sesuai kebutuhan
use App\Http\Requests\UpdateLaporanRequest; // Buat request sesuai kebutuhan
use App\Models\Laporan; // Sesuaikan dengan model laporan Anda
use Flash;
use Response;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::all(); // Ambil semua laporan
        return view('sp2ds.laporan', compact('laporans'));
    }

    public function create()
    {
        return view('sp2ds.laporan_create');
    }

    public function store(CreateLaporanRequest $request)
    {
        Laporan::create($request->validated()); // Simpan laporan baru
        Flash::success(__('Laporan berhasil disimpan.'));
        return redirect()->route('laporan.index');
    }

    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('sp2ds.laporan_show', compact('laporan'));
    }

    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('sp2ds.laporan_edit', compact('laporan'));
    }

    public function update($id, UpdateLaporanRequest $request)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->update($request->validated()); // Update laporan
        Flash::success(__('Laporan berhasil diperbarui.'));
        return redirect()->route('laporan.index');
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete(); // Hapus laporan
        Flash::success(__('Laporan berhasil dihapus.'));
        return redirect()->route('laporan.index');
    }
}
