<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Tentukan apakah user memiliki izin untuk melakukan permintaan ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi input dari form order.
     */
    public function rules(): array
    {
        return [
            'tanggal_penukaran' => 'required|date|after_or_equal:today',
        ];
    }

    /**
     * Pesan error kustom untuk validasi.
     */
    public function messages(): array
    {
        return [
            'tanggal_penukaran.required' => 'Tanggal penukaran wajib diisi.',
            'tanggal_penukaran.date' => 'Format tanggal tidak valid.',
            'tanggal_penukaran.after_or_equal' => 'Tanggal penukaran tidak boleh sebelum hari ini.',
        ];
    }
}