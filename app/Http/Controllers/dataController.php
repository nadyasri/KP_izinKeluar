<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\SesiController;
use Illuminate\Http\Request;

class dataController extends Controller
{
    public function index()
    {
        $atasan = User::where('role', 'superadmin')->get();
        $pegawai = User::where('role', 'pegawai')->get();

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
        
        return view('admin.manage-data', ['atasan' => $atasan, 'pegawai' => $pegawai]);
    }

}
