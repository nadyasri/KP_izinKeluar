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
            'status' => 'required|string|in:pending,approved,rejected',
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
            'keterangan' => $request->keperluan, #peletakan akan menyesuaikan karena dia hanya muncul apabila permohonan ditolak
            'waktu_keluar' => $request->waktu_keluar,
            'waktu_kembali' => $request->waktu_kembali,
        ]);

        return redirect()->route('Formizin.formizin')->with('success', 'Leave request sent successfully!');
    }

    public function index()
    {
        $leaveRequests = SuratIzin::where('receiver_group_id', auth()->user()->group_id)
            ->where('status', 'pending')
            ->get();

        return view('leave.index', compact('leaveRequests'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $leaveRequest = SuratIzin::findOrFail($id);
        $leaveRequest->update([
            'status' => $request->status,
        ]);

        return redirect()->route('leave.index')->with('success', 'Leave request ' . $request->status . ' successfully!');
    }
}
