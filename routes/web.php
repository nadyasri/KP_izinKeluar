<?php

use Illuminate\Http\Request;

use App\Http\Controllers\StatAdmController;
use App\Http\Controllers\StatAtasController;
use App\Http\Controllers\StatPegController;
use App\Http\Controllers\dataController;
use App\Http\Controllers\editDataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\GuidebookController;
use App\Http\Controllers\RiwayatSuratAdmController;
use App\Http\Controllers\SuratIzinController;


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
        
        #dashboard
        Route::get('/atasan/dashboard', [StatAtasController::class, 'dashboard'])->name('atasan-dashboard');

        #verifikasi-surat
        Route::get('/atasan/verifikasi-surat', [SuratIzinController::class, 'index'])->name('atasan-formVerif');
        Route::put('/atasan/verifikasi-surat/{nip}', [SuratIzinController::class, 'update'])->name('atasan-update');

        #aju-cuti
        Route::get('/atasan/ajukan-izin', [SuratIzinController::class, 'create'])->name('atasan-formIzin');

    });

    // Routes for admin
    Route::middleware(['role:admin'])->group(function() {
        
        #dashboard
        Route::get('/admin/dashboard', [StatAdmController::class, 'dashboard'])->name('admin-dashboard');

        #show-data
        Route::get('/admin/manage-data', [dataController::class, 'index']) -> name('admin-manageData');

        #update-data
        Route::get('/admin/{nip}/edit', [editDataController::class, 'edit']) -> name('admin-editAkun');
        Route::put('/admin/{nip}/update', [editDataController::class, 'update']) -> name('admin-update');

        #hapus-data
        Route::delete('/admin/{nip}/delete', [editDataController::class, 'destroy']) -> name('admin-delete'); 

        #master-izinAdm
        Route::get('/admin/master-izin', [RiwayatSuratAdmController::class, 'riwayatSurat']) -> name('admin-manageIzin');

    });

    // Routes for pegawai
    Route::middleware(['role:pegawai'])->group(function() {
        
        #dashboard
        Route::get('/pegawai/dashboard', [StatPegController::class, 'dashboard'])->name('pegawai-dashboard');

        #aju-cuti
        Route::post('/pegawai/ajukan-izin', [SuratIzinController::class, 'create'])->name('pegawai-formIzin');
    });


    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
});

#guidebook
Route::get('/guidebook', [GuidebookController::class, 'listGuidebook'])->name('guide.list');
Route::get('/guidebook-download', [GuidebookController::class, 'downloadGuidebook'])->name('download.guidebook');

#pdfGenerate(Surat)
Route::get('/generatePdf', [PdfController::class, 'generatepdf']);
#buat ngambil data dari form submission pake yang ini?

#formIzin
Route::middleware(['auth'])->group(function () {
    Route::put('/verifikasi-surat/{nip}', [SuratIzinController::class, 'update'])->name('surat.update');
});


#Route::get('/atasan/dashboard', [PegStatController::class, 'dashboard'])->name('pegawai.dashboard')->middleware('auth');


#Route::put('/pegawai/{id_pegawai}', [PegawaiController::class, 'update']); 
#Route::put('/pegawai/{id_pegawai}/edit', [PegawaiController::class, 'update']);

#Route::get('/pegawai/dashboard', [PegStatController::class, 'dashboard'])->middleware('auth');
#match the middleware as Nadya's

#form IZIN

// Route::middleware(['auth', 'role:superadmin,pegawai'])->group(function() {
    Route::get('/formizin', function () {
        return view('pegawai-formIzin');
    })->name('formizin');

    Route::get('/izin/overview', [SuratIzinController::class, 'overview'])->name('izin.overview');

// });


#Route::get('/formizin', function () {
#    return view('surat.formizin');
#});


#Route::post('/submitform', [IzinController::class, 'submitForm']);


#buat ngambil data dari form submission pake yang ini?
// Route::post('/generatePdf', [PdfController::class, 'generatepdf']);


