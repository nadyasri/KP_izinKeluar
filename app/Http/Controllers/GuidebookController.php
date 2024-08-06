<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


class GuidebookController extends Controller
{
    public function listGuidebook()
    {
        $files = ["keluar_kantor.pdf"];
        return view('admin.dashboard', compact('files'));
    }
    public function downloadGuidebook()
    {
 
        $path = Storage::path('public/keluar_kantor.pdf');
        #ganti nama_file.pdf sesuai dengan nama file yang ada di storage (apabila ada pembaruan)

        if(Storage::exists('public/keluar_kantor.pdf')) {
            return response()->download($path, 'Guidebook SIKAN.pdf');
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }
}
