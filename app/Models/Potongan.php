<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Potongan extends Model
{
    protected $table = 'potongan';

    protected $primaryKey = 'id_potongan';

    public $timestamps = false;

    protected $fillable = [
        'id_karyawan',
        'jenis_potongan',
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