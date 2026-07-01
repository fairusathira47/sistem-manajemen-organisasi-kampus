<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\KegiatanController;

use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('dashboard');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Open routes for Guests to view lists
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi.index');
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');

// Protected Resource Routes (Validation and Security)
Route::middleware(['auth'])->group(function () {
    Route::resource('anggota', AnggotaController::class)->except(['index']);
    Route::resource('divisi', DivisiController::class)->except(['index']);
    Route::resource('kegiatan', KegiatanController::class)->except(['index']);
});

// Demo Route untuk Custom Guard & User Provider
Route::get('/api/users/current', function () {
    $user = Auth::guard('api_token')->user();
    if ($user) {
        return response()->json([
            'status' => 'success',
            'message' => 'Autentikasi Custom Guard Berhasil!',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ]
        ]);
    }
    return response()->json([
        'status' => 'error',
        'message' => 'Autentikasi Gagal! Silakan sertakan header "API-Key" yang valid.'
    ], 401);
});