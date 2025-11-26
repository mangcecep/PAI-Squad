<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;

// ========== GURU CRUD ==========
Route::middleware(['auth'])->group(function () {
    Route::resource('guru', GuruController::class);
});


// ========== SISWA CRUD ==========
Route::middleware(['auth'])->group(function () {
    Route::resource('siswa', SiswaController::class);
});

// ========== DASHBOARD ==========
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

// ========== AUTH ==========
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Forgot Password
Route::get('/forgot-password', [AuthController::class, 'showForgot'])->name('forgot');
Route::post('/forgot-password', [AuthController::class, 'sendReset'])->name('forgot.send');
Route::get('/reset-password', [AuthController::class, 'showReset'])->name('reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset.process');

// Redirect root
Route::get('/', function () {
    return redirect('/login');
});
