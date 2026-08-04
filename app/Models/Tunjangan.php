<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tunjangan extends Model
{
    protected $table = 'tunjangan';

    protected $primaryKey = 'id_tunjangan';

    public $timestamps = false;

    protected $fillable = [
        'id_karyawan',
        'jenis_tunjangan',
        'nominal',
        'bulan',
        'tahun',
        'keterangan',
    ];

    protected $casts = [
        'nominal' => 'decimal:2',
    ];

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }
}