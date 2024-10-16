<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratCreateRequest;
use App\Http\Requests\SuratUpdateRequest;
use App\Models\Surat;
use App\Models\Anggaran; // Pastikan model Anggaran diimpor
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index()
    {
        // Ambil semua data surat
        $surats = Surat::all();
        
        // Ambil semua data anggaran
        $anggaran = Anggaran::all();
        
        // Kirim data ke tampilan
        return view('sp2ds.surat', compact('surats', 'anggaran'));
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

    public function print(PrintSuratRequest $request)
    {
        // Ambil tahun anggaran dari request
        $tahun_anggaran = $request->input('tahun_anggaran');
    
        // Ambil data anggaran berdasarkan tahun
        $anggaran = Anggaran::where('tahun', $tahun_anggaran)->get();
    
        // Kirim data ke tampilan print untuk ditampilkan dalam format cetak
        return view('sp2ds.surat_print', compact('anggaran', 'tahun_anggaran'));
    }
}
