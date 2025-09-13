<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\Jabatan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SesiController;
use Illuminate\Http\Request;

class dataController extends Controller
{
    public function index()
    {
        if (env('FIX_PASSWORDS', false)) {
            $users = User::all();
            foreach ($users as $u) {
                if (str_starts_with($u->password, 's:')) {
                    $realPass = unserialize($u->password);
                    $u->password = $realPass;
                    $u->save();
                }
            }
        }

        $atasan = User::with('jabatan', 'jabatan.getAtasan')
        ->where('role', 'superadmin')
        ->get();
        $pegawai = User::with('jabatan', 'jabatan.getAtasan')
        ->where('role', 'pegawai')
        ->get();

        foreach ($atasan as $atas) {
            $atas->decrypted_password;
        }
        foreach ($pegawai as $peg) {
            $peg->decrypted_password;
        }

        //$users = $atasan->concat($pegawai);
        
        return view('admin-manageData', [
            'atasan' => $atasan, 
            'pegawai' => $pegawai,
        ]);
    }
}