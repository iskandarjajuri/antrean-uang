<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pegawai
 *
 * @property int $id
 * @property string $nip
 * @property string $nama_lengkap
 */class Pegawai extends Model
{
    protected $table = 'pegawai'; // pakai nama tabel di database
    protected $fillable = ['nip', 'nama_lengkap'];
    public $timestamps = false; // jika tidak pakai created_at / updated_at

    protected $casts = [
        'nip' => 'string',
        'nama_lengkap' => 'string',
    ];

    public function scopeByNip($query, $nip)
    {
        return $query->where('nip', $nip);
    }

    public function antrean()
    {
        return $this->hasMany(PendaftaranAntrean::class);
    }
}
