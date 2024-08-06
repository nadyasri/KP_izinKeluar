<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;


class GuidebookController extends Controller
{
    public function listGuidebook()
    {
        $files = ["keluar_kantor.pdf"];
        return view('admin.dashboard', compact('files'));
    }
    public function downloadGuidebook($file)
    {
        $filePath = public_path("pdfs/{$file}");
        if (File::exists($filePath)) {
            return Response::download($filePath);
        }
        return abort(404);
    }
}
