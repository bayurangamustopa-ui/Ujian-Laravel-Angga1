<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('kelas.index'));

Route::resource('kelas', KelasController::class)
    ->parameters(['kelas' => 'id'])
    ->except(['show']);

Route::resource('siswa', SiswaController::class)
    ->parameters(['siswa' => 'id']);
