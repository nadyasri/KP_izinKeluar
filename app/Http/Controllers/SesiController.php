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
use Illuminate\Support\Facades\Log;


class SesiController extends Controller
{
    
    public function showRegistrationForm()
    {

        return view('register.register');
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
        #    'jabatan' => 'required|string|max:255', //bikin pilihan yang diambil dari 'jabatan' user
            
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
            #    'jabatan' => $request->jabatan,
            ]);

            if ($request->role == 'superadmin') {
                Atasan::create([
                    'nama' => $request->nama,
                    'username' => $request->username,
                    'password' => Crypt::encryptString($request -> password),
                    'role' => $request->role,
                    'nip' => $request->nip,
                    'pangkat' => $request->pangkat,
                #    'jabatan' => $request->jabatan,
                ]);
            } else if ($request->role == 'pegawai') { #bagian pegawai tidak bisa masuk ke database kemungkinan karena tidak adanya isi pada foreign key column alias id_atasan
                Pegawai::create([
                    'nama' => $request->nama,
                    'username' => $request->username,
                    'password' => Crypt::encryptString($request -> password),
                    'role' => $request->role,
                    'nip' => $request->nip,
                    'pangkat' => $request->pangkat,
                #    'jabatan' => $request->jabatan,
                ]);
            }

            DB::commit();

            return redirect()->route('login')->with('success', 'Registration successful! Please login.');

        #} catch (\Exception $e) {
        #    DB::rollback();
        #    return response()->json(['message' => 'Registration failed'], 500);
        #}

        //redirect ke halaman login
        #return redirect()->route('login')->with('success', 'Registration successful! Please login.');

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

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        // bikin choices, mau ke aplikasi surat keluar kantor atau ambil cuti

        if (Auth::attempt($infologin)){
            $user = Auth::user();
            $role = $user->role;

            if ($role === 'superadmin') {
                return redirect('/superadmin/dashboard');
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
    return redirect('/')->with('success', 'You have been logged out.');
}
    
}
