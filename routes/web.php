<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RecapOrderController;
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| File ini berisi semua definisi route untuk antarmuka web.
| Blade view yang diakses oleh user terhubung dari sini.
*/

/**
 * Root URL
 * Arahkan ke halaman dashboard jika sudah login (pegawai_id ada di session),
 * jika belum login maka arahkan ke halaman login.
 */
Route::get('/', function () {
    return session()->has('pegawai_id')
        ? redirect('/dashboard')
        : redirect('/login');
});

/**
 * Login
 */
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


/**
 * Halaman utama: Dashboard
 */
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



/**
 * Fitur Order
 * - Membuat order
 * - Melihat detail order
 * - Melihat & mencetak daftar order (admin)
 */
Route::prefix('order')->controller(OrderController::class)->group(function () {
    Route::post('/', 'store')->name('order.store');
    Route::get('/create', 'create')->name('order.create');
    Route::get('/{id}', 'detail')->name('order.detail');
    Route::get('/admin/list', 'adminList')->name('order.admin.list');
    Route::get('/admin/print', 'adminPrint')->name('order.admin.print');
});



/**
 * Fitur Pengaturan
 * - Lihat pengaturan umum
 * - Lihat info pengguna
 */
Route::prefix('settings')->controller(SettingController::class)->group(function () {
    Route::get('/', 'index')->name('settings.index');
    Route::get('/user-info', 'userInfo')->name('settings.userinfo');
});



/**
 * Logout pengguna (POST)
 */
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



/**
 * Fitur Rekap Order (admin)
 * - Lihat daftar rekap
 * - Cetak rekap ke PDF
 */
Route::prefix('admin/recap-orders')->controller(RecapOrderController::class)->group(function () {
    Route::get('/', 'index')->name('recap.index');
    Route::get('/print', 'print')->name('recap.print');
});



/**
 * Generate PDF Struk Antrean
 */
Route::get('/struk-antrean/pdf', function () {
    $dataPecahan = [
        ['nominal' => 100000, 'masuk' => 158000000, 'keluar' => 60000000],
        ['nominal' => 50000, 'masuk' => 17000000, 'keluar' => 46000000],
    ];

    $totalMasuk = collect($dataPecahan)->sum('masuk');
    $totalKeluar = collect($dataPecahan)->sum('keluar');

    $pdf = Pdf::loadView('pdf.struk-antrean', [
        'nomor' => 'G-005',
        'sisa' => 4,
        'nama' => 'Gunawan Saichu',
        'satker' => 'DPT. DEPARTEMEN JASA PERBANKAN PERIZINAN & OPERASIONAL TRESURI',
        'dataPecahan' => $dataPecahan,
        'totalMasuk' => $totalMasuk,
        'totalKeluar' => $totalKeluar,
    ]);

    return $pdf->stream('struk-antrean.pdf');
})->name('struk.pdf');



/**
 * Fallback jika route tidak ditemukan
 */
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
