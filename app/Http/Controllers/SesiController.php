<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SesiController extends Controller
{

    Public function formreg()
    {
        return view('register.register');
    }

    public function simpanreg(Request $req)
    {
        $req->validate([
            'username'=>'required|min:4',
            'role'=>'required|in:admin,superadmin,email',
            'password'=>'required|min:4|confirmed'
        ]);
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
            return redirect('/admin/dashboard');
        }else{
            return redirect('')->withErrors('Username dan password tidak sesuai')->withInput();
        }
    }

    
}
