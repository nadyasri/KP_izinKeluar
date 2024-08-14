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
    #UBAH DATA ATASAN
    public function edit (Request $request, $nip)
    {
        $user = User::where('nip', $nip)->first();
        if ($user) {
            $user->decrypted_password = Crypt::decryptString($user->password);
        }

        return view('admin-manageData', compact ('user'));
    }
    public function update(Request $request, $nip)
    {
        
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $nip . ',nip',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:pegawai,admin,superadmin',
            'nip' => 'required|string|max:20|unique:users,nip,' . $nip . ',nip',
            'pangkat' => 'required|string|max:255',
        #    'jabatan' => 'required|string|max:255', //bikin pilihan yang diambil dari 'jabatan' user
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        DB::beginTransaction();

        #try {
            $user = User::where('nip', $nip)->firstOrFail();
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->password = Crypt::encryptString($request -> password);
            $user->role = $request->role;
            $user->nip = $request->nip;
            $user->pangkat = $request->pangkat;
            $user->jabatan = $request->jabatan;
            $user->save();

        #    if ($request->role == 'superadmin') {
        #        Atasan::updateOrCreate(
        #            ['nip' => $nip],
        #            [
        #                'nama' => $request->nama,
        #                'username' => $request->username,
        #                'password' => Crypt::encryptString($request -> password),
        #                'role' => $request->role,
        #                'nip' => $request->nip,
        #                'pangkat' => $request->pangkat,
        #                'jabatan' => $request->jabatan,
        #            ]); 
        #    } else if ($request->role == 'pegawai') {
        #        Pegawai::updateOrCreate(
        #            ['nip' => $nip],
        #            [
        #                'nama' => $request->nama,
        #                'username' => $request->username,
        #                'password' => Crypt::encryptString($request -> password),
        #                'role' => $request->role,
        #                'nip' => $request->nip,
        #                'pangkat' => $request->pangkat,
        #                'jabatan' => $request->jabatan,
        #            ]
        #        );
        #    }

            DB::commit();

            return redirect()->route('admin-manageData')->with('success', 'Edit Berhasil!');

    #    } catch (\Exception $e) {
    #        DB::rollback();
    #        return response()->json(['message' => 'Edits gagal', 'error' => $e->getMessage()], 500);
    #    }
    }

    #HAPUS DATA
    public function destroy(Request $request, $nip)
    {
        $data = User::find($nip);
        $data->delete();

        return redirect()->route('admin-manageData')->with('success', 'Hapus Berhasil!');
    }

}
