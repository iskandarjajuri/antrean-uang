<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Pengaturan
 *
 * Menyimpan pengaturan umum aplikasi dalam bentuk pasangan nama-nilai.
 *
 * @property string $nama_pengaturan
 * @property string $nilai_pengaturan
 */
class Pengaturan extends Model
{
    /**
     * Nama tabel yang digunakan oleh model ini.
     *
     * @var string
     */
    protected $table = 'pengaturan';

    /**
     * Field yang dapat diisi secara mass-assignment.
     *
     * @var array
     */
    protected $fillable = [
        'nama_pengaturan',
        'nilai_pengaturan'
    ];

    /**
     * Casting atribut ke tipe data yang sesuai.
     *
     * @var array
     */
    protected $casts = [
        'nama_pengaturan' => 'string',
        'nilai_pengaturan' => 'string',
    ];

    /**
     * Menonaktifkan timestamp default Laravel.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Ambil nilai pengaturan berdasarkan nama.
     *
     * @param string $nama Nama pengaturan
     * @param mixed|null $default Nilai default jika tidak ditemukan
     * @return string|null
     */
    public static function getValue($nama, $default = null)
    {
        return optional(static::where('nama_pengaturan', $nama)->first())->nilai_pengaturan ?? $default;
    }
}
