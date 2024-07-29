<?php

namespace App\Http\Controllers;

use App\Models\Atasan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class dataController extends Controller
{
    public function index()
    {
        $atasan = Atasan::all();
        $pegawai = Pegawai::all();
        return view('admin.manage-data', ['atasan' => $atasan, 'pegawai' => $pegawai]);
    }
}
