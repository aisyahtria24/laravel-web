<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});

Route::get('/nama/{Yolanda}', function ($param1) {
    return 'Nama Saya: '.$param1;
});

Route::get('/nim/{pram1?}', function ($param1 = '') {
    return 'NIM Saya: '.$param1;
});

Route::get('/mahasiswa/{Yolanda}', [MahasiswaController::class, 'show']);

Route::get('/about', function (){
    return view('halaman-about');
});

Route::get('/matakuliahshow', [MatakuliahController::class, 'show']);
Route::get('/matakuliahindex', [MatakuliahController::class, 'index']);
Route::get('/matakuliahcreate', [MatakuliahController::class, 'create']);
Route::get('/matakuliahstore', [MatakuliahController::class, 'store']);
Route::get('/matakuliahedit', [MatakuliahController::class, 'edit']);
Route::get('/matakuliahupdate', [MatakuliahController::class, 'update']);
Route::get('/matakuliahdestroy', [MatakuliahController::class, 'destroy']);

Route::get('/matakuliah/{param1?}', [MahasiswaController::class, 'show']);
Route::get('/home', [HomeController::class, 'index'])-> name('home');

Route::post('question/store', [QuestionController::class, 'store'])
            -> name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])
            -> name('dashboard');

Route::resource('pelanggan', PelangganController::class);
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');

Route::resource('user', UserController::class);
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');


Route::get('/auth', function () {
    return view('home');

});
Route::get('/auth', [AuthController::class, 'index']);
Route::post('/auth/login', [AuthController::class, 'login']);
