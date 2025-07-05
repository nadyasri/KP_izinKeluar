<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /*
    public function userAtasan()
    {
        $users = User::with ([
            'jabatan', 'jabatan.getAtasan'
        ])->whereIn('role', ['superadmin', 'pegawai'])->get();

        return view('admin-manageData', compact('users'));
    }*/
}
