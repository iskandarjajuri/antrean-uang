<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Model untuk data pendaftaran antrean.
 *
 * @property int $pegawai_id
 * @property int $nomor_antrean
 * @property \Carbon\Carbon $tanggal_daftar
 * @property \Carbon\Carbon $tanggal_penukaran
 * @property \Carbon\Carbon $dibuat_pada
 * @property string|null $bukti_pdf
 *
 * @method static \Illuminate\Database\Eloquent\Builder|static hariIni()
 * @method static \Illuminate\Database\Eloquent\Builder|static untukPegawai($pegawaiId)
 * @method static \Illuminate\Database\Eloquent\Builder|static tanggalPenukaran($tanggal)
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
        'bukti_pdf',
        'dibuat_pada'
    ];

    protected $casts = [
        'pegawai_id' => 'integer',
        'nomor_antrean' => 'integer',
        'tanggal_daftar' => 'date',
        'tanggal_penukaran' => 'date',
        'dibuat_pada' => 'datetime',
        'bukti_pdf' => 'string',
    ];

    public $timestamps = false;

    /**
     * Relasi ke model Pegawai.
     */
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id')->withDefault();
    }

    /**
     * Scope untuk data pendaftaran pada tanggal hari ini.
     */
    public function scopeHariIni($query)
    {
        return $query->whereDate('tanggal_daftar', today());
    }

    /**
     * Scope untuk data pendaftaran berdasarkan pegawai tertentu.
     */
    public function scopeUntukPegawai($query, $pegawaiId)
    {
        return $query->where('pegawai_id', $pegawaiId);
    }

    /**
     * Scope untuk data pendaftaran berdasarkan tanggal penukaran tertentu.
     */
    public function scopeTanggalPenukaran($query, $tanggal)
    {
        return $query->whereDate('tanggal_penukaran', $tanggal);
    }

    /**
     * Accessor untuk mendapatkan format tanggal daftar dalam format Indonesia.
     */
    public function getTanggalDaftarFormatIndoAttribute()
    {
        return $this->tanggal_daftar ? $this->tanggal_daftar->format('d-m-Y') : null;
    }

    /**
     * Helper untuk mengambil nomor antrean terakhir hari ini.
     */
    public static function antreanTerakhirHariIni()
    {
        return static::hariIni()->max('nomor_antrean');
    }
}