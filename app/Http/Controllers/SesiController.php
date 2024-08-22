<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Atasan;
use App\Models\Jabatan;
use App\Models\Pegawai;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
            'nip' => 'required|string|max:20|unique:users',
            'pangkat' => 'required|string|max:255',
            'Users_groupId' => 'required|exists:jabatan,groupId', //bikin pilihan yang diambil dari 'jabatan' user
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        #try {
            User::create([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Crypt::encryptString($request -> password),
                'role' => $request->role,
                'nip' => $request->nip,
                'pangkat' => $request->pangkat,
                'Users_groupId' => $request->Users_groupId,
            ]);

            #if ($request->role == 'superadmin') {
            #    Atasan::create([
            #        'nama' => $request->nama,
            #        'username' => $request->username,
            #        'password' => Crypt::encryptString($request -> password),
            #        'role' => $request->role,
            #        'nip' => $request->nip,
            #        'pangkat' => $request->pangkat,
            #        'Users_groupId' => $request->Users_groupId,
            #    ]);
            #} else if ($request->role == 'pegawai') { #bagian pegawai tidak bisa masuk ke database kemungkinan karena tidak adanya isi pada foreign key column alias id_atasan
            #    Pegawai::create([
            #        'nama' => $request->nama,
            #        'username' => $request->username,
            #        'password' => Crypt::encryptString($request -> password),
            #        'role' => $request->role,
            #        'nip' => $request->nip,
            #        'pangkat' => $request->pangkat,
            #        'Users_groupId' => $request->Users_groupId,
            #    ]);
            #}

            DB::commit();

            return redirect()->route('login')->with('success', 'Registration successful! Please login.');

        #tch (\Exception $e) {
        #    DB::rollback();
        #s    return response()->json(['message' => 'Registration failed'], 500);
    }

        //redirect ke halaman login
        #return redirect()->route('login')->with('success', 'Registration successful! Please login.');

    
    
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

        $user = User::where('username', $request->username)->first();

        if ($user && Crypt::decryptString($user->password) === $request->password) {
        Auth::login($user);
        //$judul="test";
        $role = $user->role;

            Session::put('user_id', $user->id_user);
            Session::put('username', $user->username);
            Session::put('user_role', $role);
            Session::put('Users_groupId', $user-> Users_groupId);

            if ($role === 'superadmin') {
                return redirect('/atasan/dashboard');
                // yang ini
            } elseif ($role === 'admin') {
                return redirect('/admin/dashboard');
                // yang ini
            } elseif ($role === 'pegawai') {
                return redirect('/pegawai/dashboard');
                // yang ini
            }

            // Default redirect if no role matched
            } else {
                return redirect('/')->withErrors('Username dan password tidak sesuai')->withInput();
            }
        }

    public function logout()
    {
        Auth::logout();
        Session::flush(); // Menghapus semua data dari session
        return redirect('/')->with('success', 'You have been logged out.');
    }   
}