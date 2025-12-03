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
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});

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



// HALAMAN UNTUK GUEST (BELUM LOGIN)
Route::middleware('guest')->group(function () {
    Route::get('/auth', [AuthController::class, 'index'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');
    Route::get('/', function () { return view('welcome'); });
});


// HALAMAN UNTUK USER LOGIN
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard user biasa
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/question/store', [QuestionController::class, 'store'])->name('question.store');
    Route::get('/home', [HomeController::class, 'index']);

    // HALAMAN KHUSUS ADMIN
    Route::middleware(['role:admin'])
        ->prefix('admin')
        ->group(function () {
            Route::resource('user', UserController::class);
            Route::resource('pelanggan', PelangganController::class);
        });
});


Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/multipleuploads', 'MultipleuploadsController@index')->name('uploads');
Route::post('/save','MultipleuploadsController@store')->name('uploads.store');
