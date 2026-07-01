<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [
        'nama',
        'nim',
        'jurusan',
        'jabatan',
        'no_hp'
    ];

    /**
     * Enkripsi dan Dekripsi otomatis kolom no_hp menggunakan Crypt Facade
     */
    protected function noHp(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(
            get: function (?string $value) {
                if (!$value) return '';
                try {
                    return \Illuminate\Support\Facades\Crypt::decryptString($value);
                } catch (\Exception $e) {
                    return $value; // Jika data lama belum terenkripsi, kembalikan apa adanya
                }
            },
            set: fn (?string $value) => $value ? \Illuminate\Support\Facades\Crypt::encryptString($value) : '',
        );
    }
}