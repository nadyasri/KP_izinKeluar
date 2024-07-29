<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Atasan;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:master_atasan, nip',
            'namaDepan' => 'required',
            'namaBelakang' => 'required',
            'jabatan' => 'required',
            'pangkat' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required|in:superadmin,admin,pegawai',
        ]);

        $hashedPassword = Hash::make($validated['password']);

        $user = User::create([
            'nip' => $validated['nip'],
            'namaDepan' => $validated['namaDepan'],
            'namaBelakang' => $validated['namaBelakang'],
            'jabatan' => $validated['jabatan'],
            'pangkat' => $validated['pangkat'],
            'username' => $validated['username'],
            'password' => $hashedPassword,
            'role' => $validated['role'],
        ]);

        if ($user->role === 'superadmin') {
            Atasan::create([
                'nip' => $user->nip,
                'username' => $user->username,
            ]);
            Pegawai::create([
                'nip' => $user->nip,
                'username' => $user->username,
            ]);
        } elseif ($user->role === 'pegawai') {
            Pegawai::create([
                'nip' => $user->nip,
                'username' => $user->username,
            ]);
        }

        return redirect()->back()->with('success', 'User created successfully!');
    }
}
