<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Potongan;
use App\Models\Tunjangan;
use Barryvdh\DomPDF\Facade\Pdf;

class SlipGajiController extends Controller
{
    public function cetak(Gaji $gaji)
    {
        $karyawan = $gaji->karyawan;

        $tunjangan = Tunjangan::where('id_karyawan', $gaji->id_karyawan)
            ->where('bulan', $gaji->bulan)
            ->where('tahun', $gaji->tahun)
            ->get();

        $potongan = Potongan::where('id_karyawan', $gaji->id_karyawan)
            ->where('bulan', $gaji->bulan)
            ->where('tahun', $gaji->tahun)
            ->get();

        $pdf = Pdf::loadView('pdf.slip-gaji', [
            'gaji' => $gaji,
            'karyawan' => $karyawan,
            'tunjangan' => $tunjangan,
            'potongan' => $potongan,
        ]);

        return $pdf->download(
            'Slip_Gaji_' .
            str_replace(' ', '_', $karyawan->nama) .
            '_' .
            $gaji->bulan .
            '_' .
            $gaji->tahun .
            '.pdf'
        );
    }
}