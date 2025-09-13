<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class editDataController extends Controller
{
    #UBAH DATA 
    public function edit(Request $request, $username)
    {

        $akun = User::where('username', $username)
                ->with(['jabatan', 'jabatan.getAtasan'])
                ->first();
         $jabatan = Jabatan::all(); // Fetch all jabatan

        return view('admin-editAkun', compact ('akun', 'jabatan'));
    }
    public function update(Request $request, $username)
    {
        $user = User::where('username', $username)->first(); // Ambil data user berdasarkan username
        if (!$user) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id_user . ',id_user',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:pegawai,admin,superadmin',
            'nip' => 'string|max:20|unique:users,nip,' . $user->id_user . ',id_user',
            'pangkat' => 'required|string|max:255',
            'jabatan' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            $update = [
                'nama' => $request->nama,
                'username' => $request->username,
                'role' => $request->input('role'),
                'nip' => $request->input('nip'),
                'pangkat' => $request->input('pangkat'),
                'Users_groupId' => $request->input('jabatan'),
            ];
        
            if (!empty($request->password)) {
                $update['password'] = Crypt::encryptString($request->password);
            }

            $user->update($update);

            return redirect()->route('admin-manageData')->with('success', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
        

    #HAPUS DATA
    public function destroy($username)
    {
        $data = User::where('username', $username)->firstOrFail();
        $data->delete();

        return redirect()->route('admin-manageData')->with('success', 'Hapus Berhasil!');
    }
}
