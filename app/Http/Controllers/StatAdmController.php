<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratIzin;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
#please make the model for permission data

class StatAdmController extends Controller
{
    public function dashboard()
    {
        $jumlahAkun = User::count();
        $jumlahIzin = SuratIzin::count();
        $izinSetuju = SuratIzin::where('status', 'disetujui')->count();
        $izinTolak = SuratIzin::where('status', 'ditolak')->count();

        return view('admin-dashboard', compact('jumlahAkun', 'jumlahIzin', 'izinSetuju', 'izinTolak'));

    }

}
