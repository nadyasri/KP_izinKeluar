<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Atasan;
use App\Models\Jabatan;
use App\Models\Pegawai;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class SesiController extends Controller
{
    
    public function showRegistrationForm()
    {
        $jabatan = Jabatan::all(); // Fetch all jabatan
        return view('admin-register', compact('jabatan'));
    }

    public function register(Request $request)
    {
        // dd($request);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:pegawai,admin,superadmin',
            'nip' => 'string|max:20|unique:users',
            'pangkat' => 'required|string|max:255',
            'Users_groupId' => 'required|exists:jabatan,groupId', //bikin pilihan yang diambil dari 'jabatan' user
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        User::create([
            'nama' => $request->input('nama'),
            'username' => $request->input('username'),
            'password' => Crypt::encryptString($request ->input('password')),
            'role' => $request->input('role'),
            'nip' => $request->input('nip'),
            'pangkat' => $request->input('pangkat'),
            'Users_groupId' => $request->input('Users_groupId'),
        ]);

        DB::commit();

        return redirect()->route('admin-dashboard')->with('success', 'Registration successful! Please login.');
    }
    
    function indexSesi()
    {
        return view('login.login');
    }

    // bikin session
    function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $user = User::where('username', $request->input('username'))->first();

        if ($user && (
            Hash::check($request->input('password'), $user->password) || ((Crypt::decrypt($user->password) === $request->input('password')) === $request->input('password'))))
        {
            Auth::login($user);

            $role = $user->role;

            Session::put('user_id', $user->id_user);
            Session::put('username', $user->username);
            Session::put('user_role', $role);
            Session::put('Users_groupId', $user->Users_groupId);

            if ($role === 'superadmin') {
                return redirect('/atasan/dashboard');
            } elseif ($role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($role === 'pegawai') {
                return redirect('/pegawai/dashboard');
            }
                // Default redirect if no role matched
                return redirect('/')->withErrors('Role tidak dikenali')->withInput();
        } else {
                return redirect('/')->withErrors('Username dan password tidak sesuai')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        Session::flush(); // Menghapus semua data dari session
        return redirect('/')->with('success', 'You have been logged out.');
    }   
}