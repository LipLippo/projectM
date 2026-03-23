<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;

// Halaman Beranda
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// Cek Kepesertaan NIK
Route::get('/cek-kepesertaan', [BerandaController::class, 'cekKepesertaan'])->name('cek.kepesertaan');

// Cek Status Afirmasi SPMB
Route::get('/cek-spmb', [BerandaController::class, 'cekSpmb'])->name('cek.spmb');

// API Cascading Dropdown (wilayah)
Route::get('/api/kecamatan/{kabupatenId}', [BerandaController::class, 'getKecamatan']);
Route::get('/api/desa/{kecamatanId}', [BerandaController::class, 'getDesa']);
