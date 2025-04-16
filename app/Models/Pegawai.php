<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\PendaftaranAntrean;

/**
 * Model untuk data pegawai.
 *
 * @property int $id
 * @property string $nip
 * @property string $nama_lengkap
 *
 * @method static \Illuminate\Database\Eloquent\Builder byNip(string $nip)
 */
class Pegawai extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan.
     *
     * @var string
     */
    protected $table = 'pegawai';

    /**
     * Kolom yang dapat diisi secara mass-assignment.
     *
     * @var array
     */
    protected $fillable = ['nip', 'nama_lengkap'];

    /**
     * Menonaktifkan timestamps (created_at & updated_at).
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Konversi tipe data kolom.
     *
     * @var array
     */
    protected $casts = [
        'nip' => 'string',
        'nama_lengkap' => 'string',
    ];

    /**
     * Scope untuk mencari pegawai berdasarkan NIP.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $nip
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByNip($query, $nip)
    {
        return $query->where('nip', $nip);
    }

    /**
     * Relasi ke antrean yang dimiliki pegawai ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function antrean()
    {
        return $this->hasMany(PendaftaranAntrean::class);
    }

    /**
     * Accessor untuk mengambil nama singkat (nama depan saja).
     *
     * @return string
     */
    public function getNamaSingkatAttribute()
    {
        return explode(' ', $this->nama_lengkap)[0];
    }
}
