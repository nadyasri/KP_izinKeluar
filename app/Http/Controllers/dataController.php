<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SesiController;
use Illuminate\Http\Request;

class dataController extends Controller
{
    public function index()
    {
        $atasan = User::where('role', 'superadmin')->get();
        $pegawai = User::where('role', 'pegawai')->get();

        $jbt = DB::table('jabatan')->join('users', 'jabatan.groupId', '=', 'users.Users_groupId')->select('jabatan.jabatan')->get();

        $jabat = Jabatan::select('jabatan.jabatan')->join('users', 'jabatan.groupId', '=', 'users.Users_groupId')->get();


        #$atas = User::where('role', 'superadmin')->with('jabatan')->get();

        /*$jabatAtas = $atas->map(function ($atas) {
            return $atas->jabatan->jabatan ?? 'No Position';
        });*/

        #$atasJab = User::where('role', 'superadmin')->join('jabatan', 'users.Users_groupId', '=', 'jabatan.groupId')->pluck('jabatan.jabatan');
        #$jabatan = DB::table('users')->join('jabatan', 'users.Users_groupId', '=', 'jabatan.groupId')->select('users.username', 'users.Users_groupId', 'jabatan.jabatan')->where('users.Users_groupId', '!=', 0)->distinct()->get();
        #$jabatan = User::with('jabatan')->get();
        
    

        foreach ($atasan as $atas) {
            try {
                $atas->decrypted_password = Crypt::decryptString($atas->password);
            } catch (DecryptException $e) {
                // Handle the exception here, e.g., log the error or set a default value
                Log::error('Decryption error for user ID: ' . $atas->id . ' - ' . $e->getMessage());
                $atas->decrypted_password = 'Invalid encrypted data';
            }
        }
        foreach ($pegawai as $peg) {
            try {
                $peg->decrypted_password = Crypt::decryptString($peg->password);
            } catch (DecryptException $e) {
                // Handle the exception here, e.g., log the error or set a default value
                Log::error('Decryption error for user ID: ' . $peg->id . ' - ' . $e->getMessage());
                $peg->decrypted_password = 'Invalid encrypted data';
            }
        }
        
        return view('admin-manageData', ['atasan' => $atasan, 'pegawai' => $pegawai, 'jabat' => $jabat]);
    }

}
