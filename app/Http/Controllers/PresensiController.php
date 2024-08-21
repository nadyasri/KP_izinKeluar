<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class PresensiController extends Controller
{
    public function markPresence(Request $request)
    {
        $request->validate([
            'nip' => 'required|exists:users,nip',
            'groupId' => 'required|exists:users,Users_groupId',
            'tanggal' => 'required|date',
        ]);
        
        $nip = $request->input('nip');
        $groupId = $request->input('groupId');
        $date = $request->input('tanggal');

        // Find the user by NIP
        $user = DB::table('users')->where('nip', $nip)->first();

        if (!$user) {
            throw new Exception("User not found.");
        }

        // Validate if the user can mark presence
        if ($user->role !== 'pegawai' && $user->role !== 'superadmin') {
            throw new Exception("Unauthorized role.");
        }

        // Check if there's already a presence record for this user and date
        $existingPresence = DB::table('presensi')
            ->where('nip_users', $nip)
            ->where('tanggal_absen', $date)
            ->first();

        if ($existingPresence) {
            // Update the existing presence record
            DB::table('presensi')
                ->where('id_presensi', $existingPresence->id_presensi)
                ->update(['kehadiran' => 1]); // Mark as present
        } else {
            // Insert a new presence record
            DB::table('presensi')->insert([
                'nip_users' => $nip,
                'presensi_groupId' => $groupId,
                'tanggal_absen' => $date,
                'kehadiran' => 0, // Default to present
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return "Presence marked successfully.";
    }

}
