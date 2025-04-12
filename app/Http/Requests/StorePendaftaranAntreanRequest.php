<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePendaftaranAntreanRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan untuk membuat permintaan ini.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // Ubah sesuai kebutuhan autentikasi
    }

    /**
     * Aturan validasi yang berlaku untuk permintaan ini.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nip' => ['required', 'string', 'digits_between:8,20'],
        ];
    }

    /**
     * Pesan kesalahan kustom untuk validasi.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'nip.required' => 'NIP wajib diisi.',
            'nip.digits_between' => 'NIP harus antara 8 hingga 20 digit.',
        ];
    }
}
