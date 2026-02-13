<?php

use App\Http\Controllers\LatihanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/latihan', [LatihanController::class, 'index']);

Route::resource('mata-kuliah', MataKuliahController::class);
Route::resource('mahasiswa', MahasiswaController::class);
