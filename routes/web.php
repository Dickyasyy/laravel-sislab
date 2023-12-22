<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\DokterlabController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\WorkController;
use Doctrine\DBAL\Logging\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','checkRole:admin'])->group(function () {
    // Dashboard
    Route::get('/admin', [AdminController::class,'index'])->name('admin.dashboard');
    // Data User
    Route::get('/admin/pengguna', [AdminController::class,'dataPengguna'])->name('pengguna');
    Route::get('/admin/pengguna/cari', [AdminController::class, 'show'])->name('show pengguna');
    Route::get('/admin/pengguna/create', [AdminController::class,'create'])->name('create pengguna');
    Route::post('/admin/pengguna', [AdminController::class,'store'])->name('store pengguna');
    Route::delete('/admin/pengguna/{id}', [AdminController::class, 'destroy'])->name('destroy pengguna');
});

Route::middleware(['auth','checkRole:staff'])->group(function () {
    // Dashboard
    Route::get('/staff', [StaffController::class,'index'])->name('staff.dashboard');
    // Data Pasien
    Route::get('/staff/pasien', [StaffController::class,'dataPasien'])->name('staff pasien');
    Route::get('/staff/pasien/cari', [StaffController::class, 'show'])->name('show pasien');
    Route::get('/staff/pasien/create', [StaffController::class,'create'])->name('create pasien');
    Route::post('/staff/pasien', [StaffController::class,'store'])->name('store pasien');
    Route::get('/staff/pasien/{id}/edit', [StaffController::class,'edit'])->name('edit pasien');
    Route::put('/staff/pasien/{id}', [StaffController::class,'update'])->name('update pasien');
    Route::delete('/staff/pasien/{id}', [StaffController::class, 'destroy'])->name('destroy pasien');
    // Work List
    Route::get('/staff/worklist', [WorkController::class,'index'])->name('staff work'); 
    Route::get('/staff/worklist/pasien/cari', [WorkController::class,'show'])->name('show hasil');
    Route::get('/staff/pasien/{id}/hasil/edit', [WorkController::class,'edit'])->name('edit hasil');
    Route::put('/staff/pasien/{id}/hasil', [WorkController::class,'update'])->name('update hasil');
    Route::get('/staff/cetak{id}', [CetakController::class,'cetakHasil'])->name('cetak hasil');
    // Pemeriksaan
    Route::get('/staff/pemeriksaan', [PemeriksaanController::class,'index'])->name('staff pemeriksaan');
    Route::get('/staff/pemeriksaan/cari', [PemeriksaanController::class, 'show'])->name('show pemeriksaan');
    Route::get('/staff/pemeriksaan/create', [PemeriksaanController::class,'create'])->name('create pemeriksaan');
    Route::post('/staff/pemeriksaan', [PemeriksaanController::class,'store'])->name('store pemeriksaan');
    Route::get('/staff/pemeriksaan/{id}/edit', [PemeriksaanController::class,'edit'])->name('edit pemeriksaan');
    Route::put('/staff/pemeriksaan/{id}', [PemeriksaanController::class,'update'])->name('update pemeriksaan');
    Route::delete('/staff/pemeriksaan/{id}', [PemeriksaanController::class, 'destroy'])->name('destroy pemeriksaan');
});

Route::middleware(['auth','checkRole:dokter'])->group(function () {
    // Dashboard
    Route::get('/dokter', [DokterController::class,'index'])->name('dokter.dashboard');
    // Data Pasien
    Route::get('/dokter/pasien', [DokterController::class,'dataPasien'])->name('dokter pasien');
    Route::get('/dokter/pasien/{id}',[DokterController::class,'detail'])->name('dokter detail');
    Route::get('/dokter/rujukan/cari', [DokterController::class,'show'])->name('dokter show');
    // Rujukan
    Route::get('/dokter/rujukan', [DokterController::class,'rujukan'])->name('dokter rujukan');
    Route::post('/dokter/cetak', [CetakController::class,'cetakRujukan'])->name('dokter cetak');
});
