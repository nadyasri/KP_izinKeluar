<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\Atasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SesiController extends Controller
{
    
    public function showRegistrationForm()
    {

        return view('register.register');
    }

    public function register(Request $request)
    {

  #      dd($request);

  #      dd($request);

        // dd($request);


        $validator = Validator::make($request->all(), [
            'namaDepan' => 'required|string|max:255',
            'namaBelakang' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:pegawai,admin,superadmin',
            'nip' => 'required|string|max:20|unique:users',
            'pangkat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            User::create([
                'namaDepan' => $request->namaDepan,
                'namaBelakang' => $request->namaBelakang,
                'username' => $request->username,
                'password' => Crypt::encryptString($request -> password),
                'role' => $request->role,
                'nip' => $request->nip,
                'pangkat' => $request->pangkat,
                'jabatan' => $request->jabatan,
            ]);

            if ($request->role == 'superadmin') {
                Atasan::create([
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
                Pegawai::create([
                    'namaDepan' => $request->namaDepan,
                    'namaBelakang' => $request->namaBelakang,
                    'username' => $request->username,
                    'password' => Crypt::encryptString($request -> password),
                    'role' => $request->role,
                    'nip' => $request->nip,
                    'pangkat' => $request->pangkat,
                    'jabatan' => $request->jabatan,
                ]);
            }

            DB::commit();

            return redirect()->route('login')->with('success', 'Registration successful! Please login.');

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Registration failed'], 500);
        }

        //redirect ke halaman login
        #return redirect()->route('login')->with('success', 'Registration successful! Please login.');

    }

    function indexSesi()
    {
        return view('login.login');
    }

    function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)){
            $user = Auth::user();
            $role = $user->role;

            if ($role === 'superadmin') {
                return redirect()->route('superadmin.dashboard');
            } elseif ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'pegawai') {
                return redirect()->route('pegawai.dashboard');
            }

            // Default redirect if no role matched
            return redirect('/');
            } else {
                return redirect('/')->withErrors('Username dan password tidak sesuai')->withInput();
            }
    }
    public function logout()
{
    Auth::logout();
    return redirect('/')->with('success', 'You have been logged out.');
}
    public function showProfile()
    {
        $user = auth()->user();
        return view('profile', ['user' => $user]);
    }


    
}
