<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalMahasiswa = Mahasiswa::count();
    $totalMataKuliah = MataKuliah::count();
    return view('dashboard', compact('totalMahasiswa', 'totalMataKuliah'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Mahasiswa & Mata Kuliah (hanya bisa diakses setelah login)
    Route::resource('mahasiswa', MahasiswaController::class)->except(['destroy']);
    Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])
        ->name('mahasiswa.destroy')
        ->middleware('ikmi.email');
    Route::get('/mahasiswa-cetak-pdf', [MahasiswaController::class, 'cetak_pdf'])->name('mahasiswa.cetak_pdf');
    Route::resource('mata-kuliah', MataKuliahController::class);
});

require __DIR__.'/auth.php';
