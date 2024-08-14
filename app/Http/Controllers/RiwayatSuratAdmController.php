<?php

namespace App\Http\Controllers;

use App\Models\SuratIzin;
use Illuminate\Http\Request;

class RiwayatSuratAdmController extends Controller
{
    public function riwayatSurat(Request $request)
    {
        $surat = SuratIzin::query();

        // Filter by nip
        $surat->when($request->nip, function ($query) use ($request) {
            return $query->where('nip', 'like', '%' . $request->nip . '%');
        });

        // Filter by date
        #$tanggalAju=$request->tanggal;
        #$surat = IzinForm::whereDate('tanggal', $tanggalAju)->get();
        
        $surat->when($request->tanggal, function ($query) use ($request) {
            return $query->whereDate('tanggal', $request->tanggal);
        });

        #if ($request->filled('tanggal')) {
        #    $surat->whereDate('tanggal', $request->tanggal);
        #}

        $data = $surat->get();

        return view('admin-manageIzin', compact('data'));
    }
}
