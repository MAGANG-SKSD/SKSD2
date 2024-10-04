<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Anda bisa menyesuaikan ini sesuai dengan kebutuhan otorisasi
    }

    public function rules()
    {
        return [
            'nomor_sp2d' => 'required|string|max:100',  // Validasi nomor SP2D
            'tanggal_sp2d' => 'required|date',          // Validasi tanggal SP2D
            'nama_kegiatan' => 'required|string|max:255', // Validasi nama kegiatan
            'nilai_sp2d' => 'required|numeric|min:0',    // Validasi nilai SP2D
            'kode_rekening' => 'required|string|max:100', // Validasi kode rekening
            'nama_penerima' => 'required|string|max:255', // Validasi nama penerima
            'bank_tujuan' => 'required|string|max:255',   // Validasi bank tujuan
            'nomor_rekening_bank' => 'required|string|max:100', // Validasi nomor rekening
            'uraian_penggunaan' => 'nullable|string',       // Validasi uraian penggunaan (opsional)
            'jenis_belanja' => 'nullable|string|max:100',   // Validasi jenis belanja (opsional)
            'tahun_anggaran' => 'required|integer|digits:4', // Validasi tahun anggaran
            'nama_bendahara' => 'required|string|max:255',   // Validasi nama bendahara
            'status_verifikasi' => 'required|in:Diverifikasi,Disetujui,Dalam Proses', // Validasi status verifikasi
        ];
    }
}
