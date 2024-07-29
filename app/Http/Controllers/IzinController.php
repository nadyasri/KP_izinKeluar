<?php

namespace App\Http\Controllers;

use App\Models\IzinForm;
use Illuminate\Http\Request;

class IzinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function submitForm(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'nip' => 'required|string',
            'pangkat' => 'required|string',
            'Tanggal' => 'required|date',
            'Waktu_keluar' => 'required|date_format:H:i',
            'Waktu_kembali' => 'required|date_format:H:i',
            'Keperluan' => 'required|string',
        ]);

        // Simpan data ke database
        $izin = new IzinForm();
        $izin->name = $request->name;
        $izin->nip = $request->nip;
        $izin->pangkat = $request->pangkat;
        $izin->Tanggal = $request->Tanggal;
        $izin->Waktu_keluar = $request->Waktu_keluar;
        $izin->Waktu_kembali = $request->Waktu_kembali;
        $izin->Keperluan = $request->Keperluan;
        $izin->save();

        // Redirect dengan pesan sukses
        return redirect('/formizin')->with('success', 'Pengajuan izin berhasil diajukan.');
    }
}
