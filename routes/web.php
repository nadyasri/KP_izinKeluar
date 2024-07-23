<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SesiController;

use App\Http\Controllers\adminController;
use App\Http\Controllers\AdmStatController;
use App\Http\Controllers\PegStatController;

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
Route::middleware(['guest'])->group(function() {
    Route::get('/',[SesiController::class, 'indexSesi'])->name('login');
    Route::post('/login',[SesiController::class, 'login']);
});


Route::get('/admin/dashboard', [AdmStatController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/pegawai/dashboard', [PegStatController::class, 'dashboard'])->middleware('auth');
#match the middleware as Nadya's


