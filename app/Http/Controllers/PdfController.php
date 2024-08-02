<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Pastikan ini sudah diimpor

class PdfController extends Controller
{
    public function generatepdf()
    {
        // Debug untuk memastikan Pdf alias sudah dikenali

        $data = [
            'name' => 'John Doe',
            'nip' => '12345678',
            'pangkat' => 'IV/a',
            'tanggal' => '2024-08-01',
            'waktu_keluar' => '08:00',
            'waktu_kembali' => '16:00',
            'keperluan' => 'Meeting external',
        ];

        // Menggunakan alias Pdf yang benar
        $pdf = Pdf::loadView('Formizin.Pdf', $data);

        return $pdf->download('Surat_Izin_Keluar.pdf');
    }
}
