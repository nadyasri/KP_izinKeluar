<?php

use App\Http\Controllers\AdmStatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[SesiController::class, 'indexSesi']);

Route::get('/admin/dashboard', [AdmStatController::class, 'dashboard'])->name('admin.dashboard');
