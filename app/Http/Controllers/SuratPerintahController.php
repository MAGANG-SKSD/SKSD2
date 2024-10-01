<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSuratPerintahRequest; // Ganti sesuai kebutuhan
use App\Http\Requests\UpdateSuratPerintahRequest; // Ganti sesuai kebutuhan
use App\Models\SuratPerintah; // Sesuaikan dengan model Surat Perintah Anda
use Flash;
use Response;

class SuratPerintahController extends Controller
{
    public function index()
    {
        $suratPerintahs = SuratPerintah::all(); // Ambil semua Surat Perintah
        return view('sp2ds.surat_perintah', compact('suratPerintahs')); // Ganti view sesuai
    }

    public function create()
    {
        return view('sp2ds.surat_perintah_create'); // Ganti view sesuai
    }

    public function store(CreateSuratPerintahRequest $request)
    {
        SuratPerintah::create($request->validated()); // Simpan Surat Perintah baru
        Flash::success(__('Surat Perintah berhasil disimpan.'));
        return redirect()->route('surat_perintah.index'); // Ganti rute sesuai
    }

    public function show($id)
    {
        $suratPerintah = SuratPerintah::findOrFail($id);
        return view('sp2ds.surat_perintah_show', compact('suratPerintah')); // Ganti view sesuai
    }

    public function edit($id)
    {
        $suratPerintah = SuratPerintah::findOrFail($id);
        return view('sp2ds.surat_perintah_edit', compact('suratPerintah')); // Ganti view sesuai
    }

    public function update($id, UpdateSuratPerintahRequest $request)
    {
        $suratPerintah = SuratPerintah::findOrFail($id);
        $suratPerintah->update($request->validated()); // Update Surat Perintah
        Flash::success(__('Surat Perintah berhasil diperbarui.'));
        return redirect()->route('surat_perintah.index'); // Ganti rute sesuai
    }

    public function destroy($id)
    {
        $suratPerintah = SuratPerintah::findOrFail($id);
        $suratPerintah->delete(); // Hapus Surat Perintah
        Flash::success(__('Surat Perintah berhasil dihapus.'));
        return redirect()->route('surat_perintah.index'); // Ganti rute sesuai
    }
}
