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
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            // Tambahkan aturan lain sesuai kebutuhan
        ];
    }
}
