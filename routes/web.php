<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RecapOrderController;
use Barryvdh\DomPDF\Facade\Pdf;

// Halaman utama
Route::get('/', function () {
    return view('dashboard');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Order
Route::get('/order/create', function () {
    return view('order.create');
})->name('order.create');

Route::get('/order/{id}', function () {
    return view('order.detail');
})->name('order.detail');

Route::get('/admin/orders', function () {
    return view('order.admin-list');
})->name('order.admin.list');

Route::get('/admin/orders/print', function () {
    return view('order.admin-print');
})->name('order.admin.print');

// Settings
Route::get('/settings', function () {
    return view('settings.index');
})->name('settings.index');

Route::get('/settings/user-info', function () {
    return view('settings.user-info');
})->name('settings.userinfo');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Recap Orders (Admin)
Route::get('/admin/recap-orders', function () {
    return view('recap.index');
})->name('recap.index');

Route::get('/admin/recap-orders/print', function () {
    return view('recap.print');
})->name('recap.print');

// Struk Antrean PDF
Route::get('/struk-antrean/pdf', function () {
    $dataPecahan = [
        ['nominal' => 100000, 'masuk' => 158000000, 'keluar' => 60000000],
        ['nominal' => 50000, 'masuk' => 17000000, 'keluar' => 46000000],
        // Tambahkan pecahan lain jika perlu
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
