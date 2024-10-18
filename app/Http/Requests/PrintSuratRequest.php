<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrintSuratRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set true jika Anda ingin mengizinkan request ini
    }

    public function rules()
    {
        return [
            'tahun_anggaran' => 'required|integer|digits:4', // Misalnya tahun anggaran harus 4 digit
        ];
    }

    public function messages()
    {
        return [
            'tahun_anggaran.required' => 'Tahun anggaran harus diisi.',
            'tahun_anggaran.integer' => 'Tahun anggaran harus berupa angka.',
            'tahun_anggaran.digits' => 'Tahun anggaran harus 4 digit.',
        ];
    }
}
