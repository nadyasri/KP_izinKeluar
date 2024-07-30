<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class dataController extends Controller
{
    public function index()
    {
        $atasan = User::where('role', 'superadmin')->get();
        $pegawai = User::where('role', 'pegawai')->get();
        return view('admin.manage-data', ['atasan' => $atasan, 'pegawai' => $pegawai]);
    }
}
