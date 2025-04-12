<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\PendaftaranAntrean
 *
 * @property int $pegawai_id
 * @property int $nomor_antrean
 * @property \Illuminate\Support\Carbon $tanggal_daftar
 * @property \Illuminate\Support\Carbon $tanggal_penukaran
 * @property string|null $bukti_pdf
 */
class PendaftaranAntrean extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_antrean';

    protected $fillable = [
        'pegawai_id',
        'nomor_antrean',
        'tanggal_daftar',
        'tanggal_penukaran',
        'bukti_pdf'
    ];

    protected $casts = [
        'pegawai_id' => 'integer',
        'nomor_antrean' => 'integer',
        'tanggal_daftar' => 'date',
        'tanggal_penukaran' => 'date',
        'bukti_pdf' => 'string',
    ];

    public $timestamps = false;

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function scopeHariIni($query)
    {
        return $query->whereDate('tanggal_daftar', today());
    }

    public function scopeUntukPegawai($query, $pegawaiId)
    {
        return $query->where('pegawai_id', $pegawaiId);
    }
}
