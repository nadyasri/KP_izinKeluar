<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Atasan;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class editDataController extends Controller
{
    #UBAH DATA
    public function edit (Request $request, $nip)
    {
        $user = User::where('nip', $nip)->first();
        if ($user) {
            $user->decrypted_password = Crypt::decryptString($user->password);
        }

        return view('admin.edit', compact ('user'));
    }
    public function update(Request $request, $nip)
    {
        
        $validator = Validator::make($request->all(), [
            'namaDepan' => 'required|string|max:255',
            'namaBelakang' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $nip . ',nip',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:pegawai,admin,superadmin',
            'nip' => 'required|string|max:20|unique:users,nip,' . $nip . ',nip',
            'pangkat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        DB::beginTransaction();

        try {
            $user = User::where('nip', $nip)->firstOrFail();
            $user->namaDepan = $request->namaDepan;
            $user->namaBelakang = $request->namaBelakang;
            $user->username = $request->username;
            $user->password = Crypt::encryptString($request -> password);
            $user->role = $request->role;
            $user->nip = $request->nip;
            $user->pangkat = $request->pangkat;
            $user->jabatan = $request->jabatan;
            $user->save();

            if ($request->role == 'superadmin') {
                Atasan::updateOrCreate(
                    ['nip' => $nip],
                    [
                        'namaDepan' => $request->namaDepan,
                        'namaBelakang' => $request->namaBelakang,
                        'username' => $request->username,
                        'password' => Crypt::encryptString($request -> password),
                        'role' => $request->role,
                        'nip' => $request->nip,
                        'pangkat' => $request->pangkat,
                        'jabatan' => $request->jabatan,
                    ]); 
            } else if ($request->role == 'pegawai') {
                Pegawai::updateOrCreate(
                    ['nip' => $nip],
                    [
                        'namaDepan' => $request->namaDepan,
                        'namaBelakang' => $request->namaBelakang,
                        'username' => $request->username,
                        'password' => Crypt::encryptString($request -> password),
                        'role' => $request->role,
                        'nip' => $request->nip,
                        'pangkat' => $request->pangkat,
                        'jabatan' => $request->jabatan,
                    ]
                );
            }

            DB::commit();

            return redirect()->route('admin.manage-data')->with('success', 'Edit Berhasil!');

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Edits gagal', 'error' => $e->getMessage()], 500);
        }
    }

    #HAPUS DATA
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
