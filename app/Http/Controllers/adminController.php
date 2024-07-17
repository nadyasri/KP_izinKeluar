<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    function index()
    {
        echo "Hallo admin";
        echo "<h1>" . Auth::user()->name . "</h1>";
    }

}
