<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DayaTampungPantiController;
use App\Http\Controllers\PpksController;

// Halaman Beranda
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// Cek Kepesertaan NIK
Route::get('/cek-kepesertaan', [BerandaController::class, 'cekKepesertaan'])->name('cek.kepesertaan');

// Cek Status Afirmasi SPMB
Route::get('/cek-spmb', [BerandaController::class, 'cekSpmb'])->name('cek.spmb');

// Daya Tampung Panti
Route::get('/daya-tampung-panti', [DayaTampungPantiController::class, 'index'])
     ->name('daya-tampung-panti');

// PPKS
Route::get('/ppks', [PpksController::class, 'index'])->name('ppks.index');

// API Cascading Dropdown (wilayah)
Route::get('/api/kecamatan/{kabupatenId}', [BerandaController::class, 'getKecamatan']);
Route::get('/api/desa/{kecamatanId}', [BerandaController::class, 'getDesa']);
