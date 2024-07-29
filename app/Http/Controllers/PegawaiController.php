<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_atasan' => 'required|exists:master_atasan, id_atasan',
            'nip' => 'required|unique:master_atasan, nip',
            'namaDepan' => 'required',
            'namaBelakang' => 'required',
            'jabatan' => 'required',
            'pangkat' => 'required',
            'username' => 'required|unique:users, username',
            'password' => 'required',
        ]);

        $hashedPassword = Hash::make($validatedData['password']);

        User::create([
            'nip' => $validatedData['nip'],
            'namaDepan' => $validatedData['namaDepan'],
            'namaBelakang' => $validatedData['namaBelakang'],
            'jabatan' => $validatedData['jabatan'],
            'pangkat' => $validatedData['pangkat'],
            'username' => $validatedData['username'],
            'password' => $hashedPassword,
            'role' => 'pegawai',
        ]);

        Pegawai::create([
            'nip' => $validatedData['nip'],
            'namaDepan' => $validatedData['namaDepan'],
            'namaBelakang' => $validatedData['namaBelakang'],
            'jabatan' => $validatedData['jabatan'],
            'pangkat' => $validatedData['pangkat'],
            'username' => $validatedData['username'],
            'password' => $hashedPassword,
        ]);

        #return response()->json(['message' => 'Pegawai created successfully']);
    }

    public function update(Request $request, $id_pegawai)
    {
        $pegawai = Pegawai::findOrFail($id_pegawai);

        $validatedData = $request->validate([
            'id_atasan' => 'required|exists:master_atasan, id_atasan',
            'nip' => 'required|unique:master_atasan, nip',
            'namaDepan' => 'required',
            'namaBelakang' => 'required',
            'jabatan' => 'required',
            'pangkat' => 'required',
            'username' => 'required|unique:users, username' . $pegawai->id_pegawai,
            'password' => 'required'
        ]);

        $hashedPassword = Hash::make($validatedData['password']);

        $pegawai->update([
            'nip' => $validatedData['nip'],
            'namaDepan' => $validatedData['namaDepan'],
            'namaBelakang' => $validatedData['namaBelakang'],
            'jabatan' => $validatedData['jabatan'],
            'pangkat' => $validatedData['pangkat'],
            'username' => $validatedData['username'],
            'password' => $hashedPassword,
            'id_atasan' => $validatedData['id_atasan']
        ]);

        $user = User::where('username', $pegawai->username)->first();
        $user->update([
            'username' => $validatedData['username'],
            'password' => $hashedPassword
        ]);

        return response()->json(['message' => 'Pegawai updated successfully']);
    }

    public function destroy($id_pegawai)
    {

        $pegawai = Pegawai::findOrFail($id_pegawai);
        $user = User::where('username', $pegawai->username)->first();

        if ($pegawai) {
            $pegawai->delete();
        }

        $user->delete();

        return response()->json(['message' => 'Pegawai deleted successfully']);
    }

}
