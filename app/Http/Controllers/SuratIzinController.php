<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SuratIzin;
use App\Models\User;
use App\Models\Jabatan;
#use Exception;

class SuratIzinController extends Controller
{
    public function ambilPegawai()
    {
    $user = auth()->user();  // Get the currently authenticated user
    return view('pegawai-formIzin', compact('user'));
    }

    public function ambilAtasan()
    {
    $user = auth()->user();  // Get the currently authenticated user
    return view('atasan-formIzin', compact('user'));
    }

    public function kirimAtasan(Request $request)
    {
        $request->validate([
            'groupId_pengirim' => 'required|exists:users,Users_groupId',
            'groupId_penerima' => 'required|exists:jabatan,groupId',
            'nip' => 'required|exists:users,nip',
            'tanggal' => 'required|date',
            'waktu_keluar' => 'required|date_format:H:i',
            'waktu_kembali' => 'required|date_format:H:i',
            'keperluan' => 'required|string|max:255',
        ]);
        
        $recipientGroupId = $this -> findAvailableRecipient($request->groupId_penerima, $request->tanggal);

    if (!$recipientGroupId) {
        return redirect()->back()->withErrors('No available recipient found.');
    }
        
        /*$hierarchy = $this->getHierarchy($request->groupId_penerima);


        if (empty($hierarchy)) {
            return redirect()->back()->withErrors('Parent ID not found.');
        }*/


        /*$user = User::where('Users_groupId', $request->groupId_pengirim)->first();
        $jabatan = Jabatan::where('groupId', $request->groupId_penerima)->first();

        $topmostParent = end($hierarchy);*/

        SuratIzin::create([
            'groupId_pengirim' => auth()->user()->Users_groupId,
            'groupId_penerima' => $recipientGroupId,
            'nip' => auth()->user()->nip,
            'tanggal' => $request->tanggal,
            'waktu_keluar' => $request->waktu_keluar,
            'waktu_kembali' => $request->waktu_kembali,
            'keperluan' => $request->keperluan,
            'status' => 'menunggu',
            'keterangan' => " ",
        ]);

        return redirect()->route('atasan-kirimIzin')->with ('success', 'Izin berhasil diajukan.');
    }

    public function findAvailableRecipient($groupId, $date)
{
    // Start with the initial recipient (parentId of the sender)
    $recipientGroupId = $this->getSubmissionRecipient($groupId);

    // Traverse up the hierarchy until a non-absent recipient is found
    while ($this->isGroupAbsent($recipientGroupId, $date)) {
        // If absent, move to the next parentId
        $recipientGroupId = $this->getSubmissionRecipient($recipientGroupId);

        // If no parentId found (top of hierarchy), return null
        if (!$recipientGroupId) {
            return null;
        }
    }

    return $recipientGroupId;
}

public function getSubmissionRecipient($groupId)
{
    // Find the parentId for the given groupId
    return DB::table('jabatan')
                ->where('groupId', $groupId)
                ->value('parentId');
}

public function isGroupAbsent($groupId, $date)
{
    // Check if the groupId is marked absent on the given date
    return DB::table('presensi')
                ->where('user_groupId', $groupId)
                ->whereDate('tanggal_absen', $date)
                ->exists();
}

        /*public function getHierarchy($groupId)
    {
        $query = "
            WITH RECURSIVE hierarchy AS (
                SELECT groupId, parentId, jabatan
                FROM jabatan
                WHERE groupId = ?

                UNION ALL

                SELECT j.groupId, j.parentId, j.jabatan
                FROM jabatan j
                INNER JOIN hierarchy h ON j.parentId = h.groupId
            )
            SELECT * FROM hierarchy;
        ";

        return DB::select($query, [$groupId]);
    }*/

    // Method to show all incoming permission requests for the logged-in "atasan"
    #public function incoming()
    #{
    #    $user = auth()->user();
    #    $izinMasuk = SuratIzin::where('groupId_penerima', $user->Users_groupId)->get();

    #    return view('izin.incoming', compact('izinMasuk'));
    #}

    // menampilkan semua izin yang dikirim pada user tertentu (more complex)
    public function allIzin()
    {
        $currentGroupId = auth()->user()->Users_groupId;
        $izin = SuratIzin::whereHas('jabatan', function ($query) use ($currentGroupId) {
            $query->where('parentId', $currentGroupId);
        })->get();

        return view('atasan-manageIzin', compact('izin'));
    }

    // menampilkan semua izin yang dikirim pada user tertentu (straightforward)
    #public function index()
    #{
    #    $ajuIzin = SuratIzin::where('groupId_penerima', auth()->user()->groupId)->get();
    #    return view('atasan-manageIzin', compact('ajuIzin'));
    #}

    public function show($id_izin)
    {
        $ajuIzin = SuratIzin::with('user')->findOrFail($id_izin);
        return view('atasan-formVerif', compact('ajuIzin'));
    }

    public function respon(Request $request, $id_izin)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
            'keterangan' => 'required_if:status,ditolak|string|max:255', // Required if status is 'ditolak'
        ]);

        $ajuIzin = SuratIzin::findOrFail($id_izin);
        $ajuIzin->status = $request->input('status');

        if ($request->input('status') === 'ditolak') {
            $ajuIzin->keterangan = $request->input('keterangan');
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
