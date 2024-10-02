<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratCreateRequest;
use App\Http\Requests\SuratUpdateRequest;
use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index()
    {
        // Ambil semua data surat
        $surats = Surat::all();
        
        // Kirim data ke tampilan
        return view('sp2ds.surat', compact('surats'));
    }

    public function create()
    {
        // Tampilkan formulir untuk menambahkan surat baru
        return view('sp2ds.surat_create');
    }

    public function store(SuratCreateRequest $request)
    {
        // Simpan surat baru ke database
        Surat::create($request->validated());
        return redirect()->route('surat.index')->with('success', 'Surat berhasil ditambahkan.');
    }

    public function show(Surat $surat)
    {
        // Tampilkan detail surat
        return view('sp2ds.surat_show', compact('surat'));
    }

    public function edit(Surat $surat)
    {
        // Tampilkan formulir untuk mengedit surat
        return view('sp2ds.surat_edit', compact('surat'));
    }

    public function update(SuratUpdateRequest $request, Surat $surat)
    {
        // Perbarui data surat di database
        $surat->update($request->validated());
        return redirect()->route('surat.index')->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy(Surat $surat)
    {
        // Hapus surat dari database
        $surat->delete();
        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus.');
    }
}
