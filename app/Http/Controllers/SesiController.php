<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
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

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'nip' => $request->nip,
            'pangkat' => $request->pangkat,
            'jabatan' => $request->jabatan,
        ]);

        //redirect ke halaman login
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');

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

    
}
