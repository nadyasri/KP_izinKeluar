<?php


use Illuminate\Http\Request;
use App\Http\Controllers\AdmStatController;
use App\Http\Controllers\AtasanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\dataController;

#use App\Http\Controllers\adminController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IzinController;


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

#dashboard
Route::get('/admin', [AdmStatController::class, 'dashboard'])->name('admin.dashboard');

#registration
Route::post('/regist/atasan', [AtasanController::class, 'store'])->name('regist.atasan');
Route::post('/regist/pegawai', [PegawaiController::class, 'store'])->name('regist.pegawai');


#show-data
Route::get('/admin/manage-data', function(){
    return view('admin.manage-data');
});

#fetch data
Route::get('/admin/manage-data', [dataController::class, 'index']) -> name('admin.manage-data');

#update data
Route::put('/atasan/{id_atasan}', [AtasanController::class, 'update']); 
Route::put('/atasan/{id_atasan}/edit', [AtasanController::class, 'update']);

Route::put('/pegawai/{id_pegawai}', [PegawaiController::class, 'update']); 
Route::put('/pegawai/{id_pegawai}/edit', [PegawaiController::class, 'update']);

#hapus data
Route::delete('/atasan/{id_atasan}/delete', [AtasanController::class, 'destroy']); 
Route::delete('/pegawai/{id_pegawai}/delete', [PegawaiController::class, 'destroy']);

Route::get('/register', [SesiController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [SesiController::class, 'register'])->name('register.register');



#Route::get('/test-form', function () {
#    return view('test-form');
#});
#Route::post('/test-form', function (Illuminate\Http\Request $request) {
#    return 'POST request received';
#});

#Route::get('/pegawai/dashboard', [PegStatController::class, 'dashboard'])->middleware('auth');
#match the middleware as Nadya's

Route::get('/formizin', function () {
    return view('Formizin.formizin');
});

Route::post('/submitform', [IzinController::class, 'submitForm']);
