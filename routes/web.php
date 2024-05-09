<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('mahasiswa', [MahasiswaController::class ,'getAllData']);
Route::post('mahasiswa/create', [MahasiswaController::class ,'createData']);
