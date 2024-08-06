<?php

namespace App\Http\Controllers;

use App\Models\IzinForm;
use Illuminate\Http\Request;

class RiwayatSuratAdmController extends Controller
{
    public function riwayatSurat(Request $request)
    {
        $surat = IzinForm::query();

        // Filter by name
        if ($request->filled('nip')) {
            $surat->where('nip', 'like', '%' . $request->nip . '%');
        }

        // Filter by date
        if ($request->filled('tanggal')) {
            $surat->whereDate('tanggal', $request->tanggal);
        }

        $data = $surat->get();

        return view('admin.master-izin', compact('data'));
    }
}
