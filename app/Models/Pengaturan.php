<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pengaturan
 *
 * @property string $nama_pengaturan
 * @property string $nilai_pengaturan
 */
class Pengaturan extends Model
{
    protected $table = 'pengaturan';

    protected $fillable = [
        'nama_pengaturan',
        'nilai_pengaturan'
    ];

    protected $casts = [
        'nama_pengaturan' => 'string',
        'nilai_pengaturan' => 'string',
    ];

    public $timestamps = false;

    public static function get($nama, $default = null)
    {
        return optional(static::where('nama_pengaturan', $nama)->first())->nilai_pengaturan ?? $default;
    }
}
