<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Atasan;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class editDataController extends Controller
{
    #UBAH DATA
    public function edit ($nip)
    {
        $user = User::where('nip', $nip)->firstOrFail();
        $user->decrypted_password = Crypt::decryptString($user->password);
        
        dd($user);
        
        return view('admin.edit', ['user' => $user]);
    }
    public function update($nip, Request $request)
    {
        $pegawai = User::findOrFail($nip);
        $pegawai -> update($request->except([]));
        return redirect('/admin/manage-data');

    }

    public function destroy($nip)
    {

        $pegawai = User::findOrFail($nip);
        $user = User::where('username', $pegawai->username)->first();

        if ($pegawai) {
            $pegawai->delete();
        }

        $user->delete();

        return response()->json(['message' => 'Pegawai deleted successfully']);
    }

}
