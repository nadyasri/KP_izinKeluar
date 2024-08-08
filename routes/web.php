<?php

use Illuminate\Http\Request;

use App\Http\Controllers\StatAdmController;
use App\Http\Controllers\AtasanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\dataController;
use App\Http\Controllers\editDataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\StatPegController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\GuidebookController;
use App\Http\Controllers\RiwayatSuratAdmController;


// Routes for guests (not logged in)
Route::middleware(['guest'])->group(function() {
    Route::get('/', [SesiController::class, 'indexSesi'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
    Route::get('/register', [SesiController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [SesiController::class, 'register'])->name('register.register');
});

// Routes for logged-in users
Route::middleware(['auth'])->group(function() {
    // Routes for superadmin
    Route::middleware(['role:superadmin'])->group(function() {
        Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard_super'])->name('superadmin.dashboard');
    });

    // Routes for admin
    Route::middleware(['role:admin'])->group(function() {
        Route::get('/admin/dashboard', [StatAdmController::class, 'dashboard'])->name('admin.dashboard');
    });

    // Routes for pegawai
    Route::middleware(['role:pegawai'])->group(function() {
        Route::get('/pegawai/dashboard', [StatPegController::class, 'dashboard'])->name('pegawai.dashboard');
    });
});

#dashboard
// Route::get('/admin/dashboard', [AdmStatController::class, 'dashboard'])->name('admin.dashboard');
// Route::get('/pegawai/dashboard', [PegStatController::class, 'dashboard'])->name('pegawai.dashboard');
// Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard_super'])->name ('superadmin.dashboard');


// Route for logout (only for logged-in users)
Route::get('/logout', [SesiController::class, 'logout'])->name('logout')->middleware('auth');


#registration
#Route::post('/regist/atasan', [AtasanController::class, 'store'])->name('regist.atasan');
#Route::post('/regist/pegawai', [PegawaiController::class, 'store'])->name('regist.pegawai');


#dashboard
Route::get('/admin/dashboard', [StatAdmController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/pegawai/dashboard', [StatPegController::class, 'dashboard_pegawai'])->name('pegawai.dashboard');
Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard_super'])->name ('superadmin.dashboard');

#guidebook
Route::get('/guidebook', [GuidebookController::class, 'listGuidebook'])->name('guide.list');
Route::get('/guidebook-download', [GuidebookController::class, 'downloadGuidebook'])->name('download.guidebook');

#Route::get('/atasan/dashboard', [PegStatController::class, 'dashboard'])->name('pegawai.dashboard')->middleware('auth');


#show-data
Route::get('/admin/manage-data', [dataController::class, 'index']) -> name('admin.manage-data');

#update-data
Route::get('/admin/{nip}/edit', [editDataController::class, 'edit']) -> name('atasan.edit');
Route::put('/admin/{nip}/update', [editDataController::class, 'update']) -> name('atasan.update');

#Route::put('/pegawai/{id_pegawai}', [PegawaiController::class, 'update']); 
#Route::put('/pegawai/{id_pegawai}/edit', [PegawaiController::class, 'update']);

#hapus_data_atasan
Route::delete('/admin/{nip}/delete', [AtasanController::class, 'destroy']) -> name('all.delete'); 

#master-izinAdm
Route::get('/admin/master-izin', [RiwayatSuratAdmController::class, 'riwayatSurat']) -> name('admin.master-izin');

#register
Route::get('/register', [SesiController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [SesiController::class, 'register'])->name('register.register');

#Route::get('/pegawai/dashboard', [PegStatController::class, 'dashboard'])->middleware('auth');
#match the middleware as Nadya's


#form IZIN
Route::get('/formizin', function () {
    return view('Formizin.formizin');
});

Route::post('/submitform', [IzinController::class, 'submitForm']);

#pdfGenerate
Route::get('/generatePdf', [PdfController::class, 'generatepdf']);
#buat ngambil data dari form submison pake yang ini?
// Route::post('/generatePdf', [PdfController::class, 'generatepdf']);

