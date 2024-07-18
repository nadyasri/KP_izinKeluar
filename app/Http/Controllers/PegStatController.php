<?php

namespace App\Http\Controllers;

use App\Models\Pegawai; #maybe change the "User" models content
use App\Models\IzinPegawai;
use Illuminate\Http\Request;

class PegStatController extends Controller
{
    public function dashboard_pegawai(Request $request)
    {
        $ajuSetuju = IzinPegawai::where('status', 'Disetujui')
        ->where('Nama_Depan', )
        ->count();
        $ajuTolak = IzinPegawai::where('status', 'Ditolak')
        ->where('Nama_Depan', )
        ->count();
        #$akunNama = Pegawai::where('id', Authenticate::user()->id)->value('Nama_Depan, Nama_Belakang')->get();
        $namaDepan = Pegawai::select('Nama_Depan')->get();
        $akunNIP = Pegawai::select('NIP', )->get();
        

        return view('pegawai.dashboard', compact('namaDepan', 'akunNama', 'akunNIP', 'ajuSetuju', 'ajuTolak'));

        #tambahkan agar pengguna dapat mengunduh guide book aplikasi

    }
    
}
