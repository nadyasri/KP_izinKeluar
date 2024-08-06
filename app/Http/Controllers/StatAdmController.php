<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\IzinPegawai;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
#please make the model for permission data

class StatAdmController extends Controller
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
