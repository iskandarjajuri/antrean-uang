<?php

namespace App\Http\Controllers;

/**
 * Controller untuk menangani pendaftaran antrean pegawai.
 */

use App\Models\Pegawai;
use App\Models\PendaftaranAntrean;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StorePendaftaranAntreanRequest;

class PendaftaranAntreanController extends Controller
{
    const MAKSIMAL_KUOTA = 300;

    /**
     * Simpan pendaftaran antrean.
     *
     * @param \App\Http\Requests\StorePendaftaranAntreanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePendaftaranAntreanRequest $request)
    {
        try {
            $pegawai = Pegawai::where('nip', $request->nip)->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::warning("NIP tidak ditemukan: {$request->nip}");
            return response()->json(['message' => 'NIP tidak ditemukan'], 404);
        }

        $tanggalHariIni = Carbon::today();
        $tanggalBesok = Carbon::tomorrow();
        $batasTanggal = Carbon::now()->subDays(14);

        $sudahDaftar = PendaftaranAntrean::where('pegawai_id', $pegawai->id)
            ->where('tanggal_daftar', '>=', $batasTanggal)
            ->exists();

        if ($sudahDaftar) {
            return response()->json(['message' => 'Anda sudah mendaftar dalam 2 minggu terakhir'], 403);
        }

        $totalHariIni = PendaftaranAntrean::whereDate('tanggal_daftar', $tanggalHariIni)->count();
        if ($totalHariIni >= self::MAKSIMAL_KUOTA) {
            Log::info("Kuota penuh hari ini: {$tanggalHariIni}");
            return response()->json(['message' => 'Kuota hari ini sudah penuh'], 403);
        }

        $nomorBerikutnya = $totalHariIni + 1;

        try {
            $pendaftaran = PendaftaranAntrean::create([
                'pegawai_id' => $pegawai->id,
                'nomor_antrean' => $nomorBerikutnya,
                'tanggal_daftar' => $tanggalHariIni,
                'tanggal_penukaran' => $tanggalBesok,
            ]);
        } catch (\Throwable $e) {
            Log::error("Gagal menyimpan pendaftaran: " . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan pendaftaran'], 500);
        }

        Log::info("Pendaftaran berhasil untuk pegawai ID {$pegawai->id}, nomor antrean {$nomorBerikutnya}");

        return response()->json([
            'message' => 'Pendaftaran berhasil',
            'data' => [
                'nama' => $pegawai->nama_lengkap,
                'nomor_antrean' => $pendaftaran->nomor_antrean,
                'tanggal_penukaran' => $pendaftaran->tanggal_penukaran->toDateString()
            ]
        ]);
    }
}
