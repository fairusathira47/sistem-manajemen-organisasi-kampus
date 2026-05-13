<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\KegiatanController;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('anggota', AnggotaController::class);
Route::resource('divisi', DivisiController::class);
Route::resource('kegiatan', KegiatanController::class);