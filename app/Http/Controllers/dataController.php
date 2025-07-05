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
        $atasan = User::with('jabatan', 'jabatan.getAtasan')
        ->where('role', 'superadmin')
        ->get();
        $pegawai = User::with('jabatan', 'jabatan.getAtasan')
        ->where('role', 'pegawai')
        ->get();

        //$jbt = DB::table('jabatan')->join('users', 'jabatan.groupId', '=', 'users.Users_groupId')->select('jabatan.jabatan')->get();

        //$jabat = Jabatan::select('jabatan.jabatan')->join('users', 'jabatan.groupId', '=', 'users.Users_groupId')->get();


        #$atas = User::where('role', 'superadmin')->with('jabatan')->get();

        /*$jabatAtas = $atas->map(function ($atas) {
            return $atas->jabatan->jabatan ?? 'No Position';
        });*/

        #$atasJab = User::where('role', 'superadmin')->join('jabatan', 'users.Users_groupId', '=', 'jabatan.groupId')->pluck('jabatan.jabatan');
        #$jabatan = DB::table('users')->join('jabatan', 'users.Users_groupId', '=', 'jabatan.groupId')->select('users.username', 'users.Users_groupId', 'jabatan.jabatan')->where('users.Users_groupId', '!=', 0)->distinct()->get();
        #$jabatan = User::with('jabatan')->get();
        

        foreach ($atasan as $atas) {
            $atas->decrypted_password;
        }
        foreach ($pegawai as $peg) {
            $peg->decrypted_password;
        }

        //$users = $atasan->concat($pegawai);
        
        //return view('admin-manageData', ['atasan' => $atasan, 'pegawai' => $pegawai, /*'jabat' => $jabat, 'jbt'=> $jbt*/]);
        return view('admin-manageData', compact('atasan', 'pegawai'));
    }

}
