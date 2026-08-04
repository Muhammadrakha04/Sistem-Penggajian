<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $primaryKey = 'id_karyawan';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'nip',
        'nama',
        'jabatan',
        'departemen',
        'gaji_pokok',
        'tanggal_masuk',
        'status',
        'no_rekening',
        'alamat',
    ];

    protected $casts = [
        'gaji_pokok' => 'decimal:2',
        'tanggal_masuk' => 'date',
    ];

    /**
     * Relasi ke tabel users
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Relasi ke tabel tunjangan
     */
    public function tunjangans(): HasMany
    {
        return $this->hasMany(
            Tunjangan::class,
            'id_karyawan',
            'id_karyawan'
        );
    }

    /**
     * Relasi ke tabel potongan
     */
    public function potongans(): HasMany
    {
        return $this->hasMany(
            Potongan::class,
            'id_karyawan',
            'id_karyawan'
        );
    }

    /**
     * Relasi ke tabel gaji
     */
    public function gajis(): HasMany
    {
        return $this->hasMany(
            Gaji::class,
            'id_karyawan',
            'id_karyawan'
        );
    }
}