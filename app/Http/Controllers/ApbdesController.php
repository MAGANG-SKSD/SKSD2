<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;

class ApbdesController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        $anggaran = Anggaran::where('tahun', $tahun)->paginate(10);
        return view('apbdes.index', compact('anggaran'));
    }

    public function show($id)
    {
        $anggaran = Anggaran::findOrFail($id);
        return view('anggaran.show', compact('anggaran'));
    }

    public function showAnggaran()
    {
        {
            $tahun = $request->tahun ?? date('Y');
            $anggaran = Anggaran::where('tahun', $tahun)->paginate(10);
            return view('apbdes.anggaran.index', compact('anggaran'));
        }
    }

    public function verifikasi(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        $anggaran = Anggaran::where('verifikasi', 0)->paginate(10);
        return view('apbdes.verifikasi', compact('anggaran'));
    }

    // Method for displaying the realization view
    public function realisasi(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        $anggaran = Anggaran::where('tahun', $tahun)->paginate(10);
        return view('apbdes.realisasi', compact('anggaran'));
    }
}
