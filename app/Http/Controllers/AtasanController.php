<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atasan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AtasanController extends Controller
{
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'nip' => 'required|unique:master_atasan, nip',
            'namaDepan' => 'required',
            'namaBelakang' => 'required',
            'jabatan' => 'required',
            'pangkat' => 'required',
            'username' => 'required|unique:users, username',
            'password' => 'required',
        ]);

        $hashedPassword = Hash::make($validateData['password']);

        User::create([
            'nip' => $validateData['nip'],
            'namaDepan' => $validateData['namaDepan'],
            'namaBelakang' => $validateData['namaBelakang'],
            'jabatan' => $validateData['jabatan'],
            'pangkat' => $validateData['pangkat'],
            'username' => $validateData['username'],
            'password' => $hashedPassword,
            'role' => 'atasan',
        ]);

        Atasan::create([
            'nip' => $validateData['nip'],
            'namaDepan' => $validateData['namaDepan'],
            'namaBelakang' => $validateData['namaBelakang'],
            'jabatan' => $validateData['jabatan'],
            'pangkat' => $validateData['pangkat'],
            'username' => $validateData['username'],
            'password' => $hashedPassword,
        ]);

        #return response() -> json(['message' => 'Atasan created successfully'], 201);
    }

    public function update(Request $request, $id_atasan)
    {
     $atasan = Atasan::findOrFail($id_atasan);
        $validateData = $request->validate([
            'nip' => 'required|unique:master_atasan, nip',
            'namaDepan' => 'required',
            'namaBelakang' => 'required',
            'jabatan' => 'required',
            'pangkat' => 'required',
            'username' => 'required|unique:users, username' . $atasan->id_atasan,
            'password' => 'required'
        ]);

        $hashedPassword = Hash::make($validateData['password']);

        $atasan->update([
            'nip' => $validateData['nip'],
            'namaDepan' => $validateData['namaDepan'],
            'namaBelakang' => $validateData['namaBelakang'],
            'jabatan' => $validateData['jabatan'],
            'pangkat' => $validateData['pangkat'],
            'username' => $validateData['username'],
            'password' => $hashedPassword,
        ]);

        $user = User::where('username', $atasan->username)->first();
        $user->update([
            'username' => $validateData['username'],
            'password' => $hashedPassword
        ]);

        #return response() -> json(['message' => 'Atasan updated successfully'], 201);
    }

    public function destroy($id_atasan)
    {
        $atasan = Atasan::findOrFail($id_atasan);
        $user = User::where('username', $atasan->username)->first();

        $atasan->delete();
        $user->delete();

        #return response() -> json(['message' => 'Atasan deleted successfully'], 201);
    }
    

}
