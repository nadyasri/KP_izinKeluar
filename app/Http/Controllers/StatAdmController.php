<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\IzinForm;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
#please make the model for permission data

class StatAdmController extends Controller
{
    public function dashboard()
    {
        $jumlahAkun = User::count();
        $jumlahIzin = IzinForm::count();
        $izinSetuju = IzinForm::where('status', 'Disetujui')->count();
        $izinTolak = IzinForm::where('status', 'Ditolak')->count();

        return view('admin.dashboard', compact('jumlahAkun', 'jumlahIzin', 'izinSetuju', 'izinTolak'));

    }

}
