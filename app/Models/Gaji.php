<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gaji extends Model
{
    protected $table = 'gaji';

    protected $primaryKey = 'id_gaji';

    public $timestamps = false;

    protected $fillable = [
        'id_karyawan',
        'bulan',
        'tahun',
        'total_tunjangan',
        'total_potongan',
        'gaji_bersih',
        'tanggal_proses',
        'status_pembayaran',
    ];

    protected $casts = [
        'total_tunjangan' => 'decimal:2',
        'total_potongan' => 'decimal:2',
        'gaji_bersih' => 'decimal:2',
        'tanggal_proses' => 'date',
    ];

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }
}