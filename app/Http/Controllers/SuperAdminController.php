<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard_super(Request $request)
    {
        return 'Hallo SuperAdmin';
    }
}

