<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\PendaftaranAntrean;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| File ini digunakan untuk mendefinisikan perintah Artisan custom.
| Perintah di bawah akan menghasilkan file PDF berisi laporan antrean
| yang bisa digunakan sebagai dokumen fisik saat datang ke penukaran uang.
|
*/

Artisan::command('generate:laporan-antrean', function () {
    $tanggalHariIni = Carbon::now()->format('Y-m-d');
    $dataAntrean = PendaftaranAntrean::with('pegawai')
        ->whereDate('tanggal_penukaran', $tanggalHariIni)
        ->orderBy('nomor_antrean')
        ->get();

    if ($dataAntrean->isEmpty()) {
        $this->warn("Tidak ada data antrean untuk tanggal $tanggalHariIni");
        return;
    }

    $pdf = Pdf::loadView('pdf.laporan-antrean', [
        'tanggal' => $tanggalHariIni,
        'antrean' => $dataAntrean
    ]);

    $namaFile = "laporan-antrean-$tanggalHariIni.pdf";
    Storage::put("public/laporan/$namaFile", $pdf->output());

    $this->info("Laporan antrean berhasil dibuat: storage/app/public/laporan/$namaFile");
})->purpose('Generate laporan PDF untuk antrean penukaran uang hari ini');
