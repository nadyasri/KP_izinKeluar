<?php

namespace App\Http\Controllers;

use App\Models\User; #must change the "User" models content
use App\Models\IzinPegawai;
use Illuminate\Http\Request;

class AdmStatController extends Controller
{
    public function dashboard()
    {
        $jumlahAkun = User::count();
        $jumlahIzin = IzinPegawai::count();
        $izinSetuju = IzinPegawai::where('status', 'Disetujui')->count();
        $izinTolak = IzinPegawai::where('status', 'Ditolak')->count();

        return view('admin.dashboard', compact('jumlahAkun', 'jumlahIzin', 'izinSetuju', 'izinTolak'));

        #tambahkan agar pengguna dapat mengunduh guide book aplikasi

    }
}
