<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSuratPerintahRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Pastikan untuk menyesuaikan ini sesuai dengan kebijakan otorisasi Anda
    }

    public function rules()
    {
        return [
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul harus diisi.',
            'judul.string' => 'Judul harus berupa teks.',
            'judul.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'tanggal.required' => 'Tanggal harus diisi.',
            'tanggal.date' => 'Tanggal harus berupa format tanggal yang valid.',
        ];
    }
}
