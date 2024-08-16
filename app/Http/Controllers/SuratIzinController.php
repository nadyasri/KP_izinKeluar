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
            'status' => 'required|in:menunggu,disetujui,ditolak',
            'keterangan' => 'required|string|max:255',
            'waktu_keluar' => 'required|date_format:H:i',
            'waktu_kembali' => 'required|date_format:H:i'
        ]);


        $user = User::where('Users_groupId', $request->groupId_pengirim)->first();
        $jabatan = Jabatan::where('groupId', $request->groupId_penerima)->first();

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

        return view('formIzin', compact('ajuKeluar', 'user', 'jabatan'));
    }

    #public function index()
    #{
    #    $ajuIzin = SuratIzin::where('groupId_penerima', auth()->user()->groupId)->get();
    #    return view('atasan-manageIzin', compact('ajuIzin'));
    #}
    
    // Method to show all incoming permission requests for the logged-in "atasan"
    #public function incoming()
    #{
    #    $user = auth()->user();
    #    $izinMasuk = SuratIzin::where('groupId_penerima', $user->Users_groupId)->get();

    #    return view('izin.incoming', compact('izinMasuk'));
    #}

    public function allIzin()
{
    // Get the current user's groupId
    $currentGroupId = auth()->user()->Users_groupId;

    // Fetch the permissions where the groupId of the permission's receiver is equal to the current user's groupId
    $izin = SuratIzin::whereHas('jabatan', function ($query) use ($currentGroupId) {
        $query->where('parentId', $currentGroupId);
    })->get();

    return view('atasan-manageIzin', compact('permissions'));
}
    
    // Method to show a specific permission request
    #public function show($id_izin)
    #{
    #    $ajuIzin = SuratIzin::findOrFail($id_izin);
    #    return view('atasan-manageIzin', compact('ajuIzin'));
    #}

    public function respon(Request $request, $id_izin)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
        ]);

        $ajuIzin = SuratIzin::findOrFail($id_izin);
        $ajuIzin->status = $request->input('status');

        if ($request->input('status') === 'rejected') {
            $ajuIzin->keterangan = $request->input('note');
    }

    $ajuIzin->save();

        return redirect()->route('atasan-manageIzin')->with('success', 'Leave request ' . $request->status . ' successfully!');
    }


    public function overview()
{
    // $izin = SuratIzin::with(['pengirim', 'penerima'])->findOrFail();
    // return view('izin.overview', compact('izin'));
}

}
