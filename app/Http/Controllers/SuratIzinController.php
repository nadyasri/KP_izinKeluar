<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratIzin;
use App\Models\User;
use App\Models\Jabatan;

class SuratIzinController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'groupId_pengirim' => 'required|exists:users,Users_groupId',
            'groupId_penerima' => 'required|exists:jabatan,groupId',
            'tanggal' => 'required|date',
            'keperluan' => 'required|string|max:255',
            'status' => 'required|string|in:menunggu,disetujui,ditolak',
            'keterangan' => 'required|string|max:255',
            'waktu_keluar' => 'required|date_format:H:i',
            'waktu_kembali' => 'required|date_format:H:i'
        ]);

        $ajuKeluar = SuratIzin::create([
            'groupId_pengirim' => $request->groupId_penerima,
            'groupId_penerima' => $request->groupId_penerima,
            'tanggal' => $request->tanggal,
            'keperluan' => $request->keperluan,
            'status' => $request->status,
            'keterangan' => $request->keterangan, #peletakan akan menyesuaikan karena dia hanya muncul apabila permohonan ditolak
            'waktu_keluar' => $request->waktu_keluar,
            'waktu_kembali' => $request->waktu_kembali,
        ]);

        return redirect()->route('dashboard')->with('success', 'Leave request sent successfully!');
    }

    public function index()
    {
        $ajuIzin = SuratIzin::all();
        return view('atasan-manageIzin', compact('ajuIzin'));
    }

    public function update(Request $request, $nip)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
        ]);

        $ajuIzin = SuratIzin::findOrFail($nip);
        $ajuIzin->update([
            'status' => $request->status,
        ]);

        return redirect()->route('atasan-manageIzin')->with('success', 'Leave request ' . $request->status . ' successfully!');
    }
}
