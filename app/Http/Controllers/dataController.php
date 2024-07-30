<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class dataController extends Controller
{
    public function index()
    {
        $atasan = User::where('role', 'superadmin')->get();
        $pegawai = User::where('role', 'pegawai')->get();

        foreach ($atasan as $atas) {
            $atas->decrypted_password = Crypt::decryptString($atas->password);
        }
        foreach ($pegawai as $peg) {
            $peg->decrypted_password = Crypt::decryptString($peg->password);
        }
        
        return view('admin.manage-data', ['atasan' => $atasan, 'pegawai' => $pegawai]);
    }
}
