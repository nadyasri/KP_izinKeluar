<?php

namespace App\Http\Controllers;

use App\Models\Pegawai; #maybe change the "User" models content
use App\Models\SuratIzin;
use Illuminate\Http\Request;
#please make the model for permission data

class StatAtasController extends Controller
{
    public function dashboard(Request $request)
    {
        #return 'Controller is working!';
        $menunggu = SuratIzin::where('status', 'menunggu')
        ->where('groupId_penerima', auth()->user()->group_id)
        ->count();
        $konfirmasi = SuratIzin::whereIn('status', ['ditolak', 'disetujui'])
        ->where('groupId_penerima', auth()->user()->group_id)
        ->count();
        #$akunNama = Pegawai::where('id', Authenticate::user()->id)->value('Nama_Depan, Nama_Belakang')->get();
        #$namaDepan = Pegawai::select('nip')->get();
        #$akunNIP = Pegawai::select('nip', $nip)->get();
        

        return view('atasan-dashboard', compact('menunggu', 'konfirmasi'));
    }
    
}
