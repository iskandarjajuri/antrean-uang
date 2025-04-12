<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranAntreanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Di file ini Anda dapat mendaftarkan semua endpoint API aplikasi Anda.
| Route berikut digunakan untuk pendaftaran antrean penukaran uang
| yang hanya tersedia setiap hari Selasa dan dibatasi maksimal 300 antrean.
|
*/

/**
 * Endpoint untuk mendaftarkan pegawai ke sistem antrean penukaran uang.
 * Method: POST
 * URL: /api/pendaftaran
 * Body Parameter:
 * - nip (string, required): Nomor Induk Pegawai yang valid
 * Response:
 * - 200: Jika berhasil
 * - 403/404: Jika gagal karena hari tidak sesuai, sudah pernah daftar, atau kuota penuh
 */
Route::post('/pendaftaran', [PendaftaranAntreanController::class, 'store']);
