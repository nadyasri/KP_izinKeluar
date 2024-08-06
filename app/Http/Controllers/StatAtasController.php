<?php

namespace App\Http\Controllers;

use App\Models\Pegawai; #maybe change the "User" models content
use App\Models\IzinPegawai;
use Illuminate\Http\Request;
#please make the model for permission data

class StatAtasController extends Controller
{
    public function dashboard_pegawai(Request $request, $nip)
    {
        #return 'Controller is working!';
        $menunggu = IzinPegawai::where('status', 'Pending')
        ->where('nip', $nip)
        ->count();
        $konfirmasi = IzinPegawai::where('status', 'Ditolak')
        ->where('nip', $nip)
        ->count();
        #$akunNama = Pegawai::where('id', Authenticate::user()->id)->value('Nama_Depan, Nama_Belakang')->get();
        #$namaDepan = Pegawai::select('nip')->get();
        #$akunNIP = Pegawai::select('nip', $nip)->get();
        

        return view('atasan.dashboard', compact('menunggu', 'konfirmasi'));

        #tambahkan agar pengguna dapat mengunduh guide book aplikasi

    }
    
}
