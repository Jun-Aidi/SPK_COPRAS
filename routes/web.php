<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\HasilAkhirController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeederController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Guest routes
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });

    // Authentication routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // Registration routes
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});

// Authenticated routes
Route::middleware(['auth.user'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin routes
    Route::middleware('admin')->group(function () {
        Route::resource('kriteria', KriteriaController::class);
        Route::resource('subkriteria', SubKriteriaController::class);
        Route::resource('alternatif', AlternatifController::class);

        Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
        Route::get('/penilaian/create', [PenilaianController::class, 'create'])->name('penilaian.create');
        Route::post('/penilaian', [PenilaianController::class, 'store'])->name('penilaian.store');
        Route::get('/penilaian/edit', [PenilaianController::class, 'edit'])->name('penilaian.edit');
        Route::put('/penilaian', [PenilaianController::class, 'update'])->name('penilaian.update');
        Route::delete('/penilaian/{id}', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');

        Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');

        Route::resource('user', UserController::class);

        // Seeder route
        Route::post('/seeder/run', [SeederController::class, 'run'])->name('seeder.run');
    });

    // Common authenticated routes
    Route::get('/hasilakhir', [HasilAkhirController::class, 'index'])->name('hasilakhir.index');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
