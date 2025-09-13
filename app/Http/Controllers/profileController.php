<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class profileController extends Controller
{
    public function getProfilesidebar($id_user) 
    {
        $showProfile = User::where('id_user', $id_user)
        ->first();

        return view('sidebar-admin', compact('showProfile'));
    }

    public function getProfilePage($id_user) 
    {
        $showProfile = User::where('id_user', $id_user)
        ->first();

        return view('editProfile', compact('showProfile'));
    }

    public function updateProfile(Request $request) 
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        /** @var \App\Models\User $user */
        $user = auth()->user();

        if ($request->hasFile('photo')) {
            // Remove old photo if exists and not default
            if ($user->photo && !str_contains($user->photo, 'default')) {
            Storage::delete('public/profile/' . $user->photo);
            }

            // Rename new photo based on user ID
            $ext = $request->file('photo')->getClientOriginalExtension();
            $newFilename = 'user-' . $user->id_user . '.' . $ext;

            $request->file('photo')->storeAs('public/profile/', $newFilename);
            $user->photo = $newFilename;
        }

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
