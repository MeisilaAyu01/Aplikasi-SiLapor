<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SpesifikasiController;
use App\Http\Controllers\SearchController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

Route::get('/spesifikasi-laporan', function () {
    return view('spesifikasi_laporan');
})->name('spesifikasi_laporan');



// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/register', function () {
    return redirect('/login');
})->name('register');


// Autentikasi
Auth::routes();

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/search', [SearchController::class, 'search'])->name('search');


// Middleware untuk redirect ke welcome jika tidak sesuai role
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
    Route::get('/bidang', [BidangController::class, 'index'])->name('bidang.index');
    Route::get('/tanggapan', [TanggapanController::class, 'index'])->name('tanggapan.index');
    Route::get('/tanggapan/create', [TanggapanController::class, 'create'])->name('tanggapan.create');
    Route::post('/tanggapan', [TanggapanController::class, 'store'])->name('tanggapan.store');
    Route::get('/tanggapan/{id}', [TanggapanController::class, 'show'])->name('tanggapan.show');

    Route::get('/spesifikasi-laporan', [SpesifikasiController::class, 'index']);
    Route::get('/spesifikasi-laporan', function () {
        return view('spesifikasi_laporan');
    });

});

// Middleware untuk admin, petugas, dan sekolah
Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin,petugas,sekolah'])->group(function () {
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');
        Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
        Route::resource('bidang', BidangController::class);
        Route::get('/kirim.notifikasi', [UserController::class, 'kirimNotifikasi'])->name('kirim.notifikasi');
        Route::resource('tanggapan', TanggapanController::class);
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::resource('petugas', PetugasController::class);
        // Route::resource('bidang', BidangController::class);
        
    });
    
});

Route::get('/spesifikasi-laporan', [SpesifikasiController::class, 'index']);
Route::get('/spesifikasi-laporan', function () {
    return view('spesifikasi_laporan');
});

Route::get('/kirim.notifikasi', [UserController::class, 'kirimNotifikasi'])->name('kirim.notifikasi');
Route::post('/laporan/{id}/kirim-email', [LaporanController::class, 'kirimEmail'])->name('laporan.kirimEmail');
Route::post('laporan/upload-pdf', 'LaporanController@uploadPdf')->name('laporan.uploadPdf');
Route::get('tanggapan/create/{laporanID}', [TanggapanController::class, 'create'])->name('tanggapan.create');


// Middleware untuk menangani akses tidak sah
Route::fallback(function () {
    return redirect('/'); // Redirect ke halaman utama jika tidak punya akses
});