<?php


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
// Routes for guests (not logged in)
Route::middleware(['guest'])->group(function() {
    Route::get('/', [SesiController::class, 'indexSesi'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
    Route::get('/register', [SesiController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [SesiController::class, 'register'])->name('register.register');
});

// Route for logout (only for logged-in users)
Route::get('/logout', [SesiController::class, 'logout'])->name('logout')->middleware('auth');

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

Route::get('/admin/dashboard', [AdmStatController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/pegawai/dashboard', [PegStatController::class, 'dashboard'])->middleware('auth');
#match the middleware as Nadya's

Route::get('/formizin', function () {
    return view('Formizin.formizin');
});

Route::post('/submitform', [IzinController::class, 'submitForm']);
