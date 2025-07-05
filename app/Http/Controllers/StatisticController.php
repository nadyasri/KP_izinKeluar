<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratIzin;
//use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
#please make the model for permission data

class StatisticController extends Controller
{
    public function dashboardSuperadmin(Request $request)
    {
        #return 'Controller is working!';

        $groupId = auth()->user()->group_id;

        $menunggu = SuratIzin::where('status', 'menunggu')
        ->where('groupId_penerima', $groupId)
        ->count();
        $konfirmasi = SuratIzin::whereIn('status', ['ditolak', 'disetujui'])
        ->where('groupId_penerima', $groupId)
        ->count();

        return view('atasan-dashboard', compact('menunggu', 'konfirmasi'));
    }
    
    public function dashboardAdmin()
    {
        $jumlahAkun = User::where('nama', '!=', 'Adminum')->count();
        $jumlahIzin = SuratIzin::count();
        $izinSetuju = SuratIzin::where('status', 'disetujui')->count();
        $izinTolak = SuratIzin::where('status', 'ditolak')->count();
        
        return view('admin-dashboard', compact('jumlahAkun', 'jumlahIzin', 'izinSetuju', 'izinTolak'));
    }

    public function dashboardPegawai(Request /*$request*/ $nip)
    {
        #return 'Controller is working!';
        $ajuSetuju = SuratIzin::where('nip', $nip)
        ->where('status', 'disetujui')
        ->count();
        $ajuTolak = SuratIzin::where('nip', $nip)
        ->where('status', 'ditolak')
        ->count();
        #$akunNama = Pegawai::where('id', Authenticate::user()->id)->value('Nama_Depan, Nama_Belakang')->get();
        #$namaDepan = Pegawai::select('nip')->get();
        #$akunNIP = Pegawai::select('nip', $nip)->get();
        

        return view('pegawai-dashboard', compact('ajuSetuju', 'ajuTolak'));

    }

}
