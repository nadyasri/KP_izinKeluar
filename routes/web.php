<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AdmStatController;
use App\Http\Controllers\AtasanController;
use App\Http\Controllers\PegawaiController;
<<<<<<< HEAD
use App\Http\Controllers\dataController;use Illuminate\Support\Facades\Route;use App\Http\Controllers\SesiController;use App\Http\Controllers\adminController;use App\Http\Controllers\PegStatController;
use App\Http\Controllers\IzinController;
=======
use App\Http\Controllers\dataController;
use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\PegStatController;

>>>>>>> eed13614e5da93b081f9650601cd38f482d45742
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
// Routes for guests (not logged in)
Route::middleware(['guest'])->group(function() {
    Route::get('/', [SesiController::class, 'indexSesi'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
    Route::get('/register', [SesiController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [SesiController::class, 'register'])->name('register.register');
});


#dashboard
Route::get('/admin/dashboard', [AdmStatController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/pegawai/dashboard', [PegStatController::class, 'dashboard'])->middleware('auth');


Route::get('/register', [SesiController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [SesiController::class, 'register'])->name('register.register');
<<<<<<< HEAD

=======
=======
>>>>>>> eed13614e5da93b081f9650601cd38f482d45742
// Routes for logged-in users
Route::middleware(['auth'])->group(function() {
    // Routes for superadmin
    Route::middleware(['role:superadmin'])->group(function() {
        Route::get('/superadmin', function() {
            return view('superadmin.dashboard');
        })->name('superadmin.dashboard');
    });

    // Routes for admin
    Route::middleware(['role:admin'])->group(function() {
        Route::get('/admin/dashboard', function() {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    // Routes for pegawai
    Route::middleware(['role:pegawai'])->group(function() {
        Route::get('/pegawai/dashboard', function() {
            return view('pegawai.dashboard');
        })->name('pegawai.dashboard');
    });
});


// Route for logout (only for logged-in users)
Route::get('/logout', [SesiController::class, 'logout'])->name('logout')->middleware('auth');

<<<<<<< HEAD
#registration
Route::post('/regist/atasan', [AtasanController::class, 'store'])->name('regist.atasan');
Route::post('/regist/pegawai', [PegawaiController::class, 'store'])->name('regist.pegawai');
=======
>>>>>>> eed13614e5da93b081f9650601cd38f482d45742

#dashboard
Route::get('/admin/dashboard', [AdmStatController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/pegawai/dashboard', [PegStatController::class, 'dashboard'])->name('pegawai.dashboard')->middleware('auth');
<<<<<<< HEAD
#Route::get('/atasan/dashboard', [PegStatController::class, 'dashboard'])->name('pegawai.dashboard')->middleware('auth');
=======
>>>>>>> eed13614e5da93b081f9650601cd38f482d45742

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

#hapus_data_atasan
Route::delete('/atasan/{id_atasan}/delete', [AtasanController::class, 'destroy']); 
Route::delete('/pegawai/{id_pegawai}/delete', [PegawaiController::class, 'destroy']);

<<<<<<< HEAD
=======
Route::get('/register', [SesiController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [SesiController::class, 'register'])->name('register.register');


// Routes for logged-in users
Route::middleware(['auth'])->group(function() {
    // Routes for superadmin
    Route::middleware(['role:superadmin'])->group(function() {
        Route::get('/superadmin', function() {
            return view('superadmin.dashboard');
        })->name('superadmin.dashboard');
    });

    // Routes for admin
    Route::middleware(['role:admin'])->group(function() {
        Route::get('/admin', function() {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    // Routes for pegawai
    Route::middleware(['role:pegawai'])->group(function() {
        Route::get('/pegawai', function() {
            return view('pegawai.dashboard');
        })->name('pegawai.dashboard');
    });
});




#Route::get('/test-form', function () {
#    return view('test-form');
#});
#Route::post('/test-form', function (Illuminate\Http\Request $request) {
#    return 'POST request received';
#});

#Route::get('/pegawai/dashboard', [PegStatController::class, 'dashboard'])->middleware('auth');
#match the middleware as Nadya's
>>>>>>> eed13614e5da93b081f9650601cd38f482d45742

#form IZIN
Route::get('/formizin', function () {
    return view('Formizin.formizin');
});

Route::post('/submitform', [IzinController::class, 'submitForm']);
