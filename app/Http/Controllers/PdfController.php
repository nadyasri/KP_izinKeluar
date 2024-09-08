<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Pastikan ini sudah diimpor

class PdfController extends Controller
{
    public function generatepdf(Request $request)
    {
        $data = [
            'atasan' => [
                'nama' => 'Nama Atasan',
                'nip' => 'NIP Atasan',
                'pangkat' => 'Pangkat Atasan',
                'jabatan' => 'Jabatan Atasan',
                'unit_kerja' => 'Unit Kerja Atasan',
            ],
            'pegawai' => [
                'nama' => 'Nama Pegawai',
                'nip' => 'NIP Pegawai',
                'pangkat' => 'Pangkat Pegawai',
                'jabatan' => 'Jabatan Pegawai',
                'keperluan' => 'Keperluan Pegawai',
            ],
        ];
        
        $pdf = Pdf::loadView('surat.Pdf', $data);

        return $pdf->download('Surat_Izin_Keluar.pdf');
    }
}
