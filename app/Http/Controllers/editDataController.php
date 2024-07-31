<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Atasan;
use App\Models\User;

class editDataController extends Controller
{
    #UBAH PEGAWAI
    public function edit ($nip)
    {

    }
    public function update(Request $request, $nip)
    {
        $pegawai = User::findOrFail($nip);

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

    # UBAH ATASAN
    public function update(Request $request, $nip)
    {
     $atasan = Atasan::findOrFail($nip);
        $validateData = $request->validate([
            'nip' => 'required|unique:master_atasan, nip',
            'namaDepan' => 'required',
            'namaBelakang' => 'required',
            'jabatan' => 'required',
            'pangkat' => 'required',
            'username' => 'required|unique:users, username' . $atasan->id_atasan,
            'password' => 'required'
        ]);

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

    public function destroy($nip)
    {
        $atasan = Atasan::findOrFail($nip);
        $user = User::where('username', $atasan->username)->first();

        $atasan->delete();
        $user->delete();

        #return response() -> json(['message' => 'Atasan deleted successfully'], 201);
    }
}
