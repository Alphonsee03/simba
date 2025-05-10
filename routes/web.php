<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BeasiswaController;
use App\Http\Controllers\Admin\PendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'submit'])->name('auth.submit');
Route::get('/registrasi', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/registrasi', [App\Http\Controllers\AuthController::class, 'submitregister'])->name('register.submit');

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('beasiswas', [BeasiswaController::class, 'index'])->name('beasiswas.index');
    Route::get('beasiswas/create', [BeasiswaController::class, 'create'])->name('beasiswas.create');
    Route::post('beasiswas', [BeasiswaController::class, 'store'])->name('beasiswas.store');
    Route::get('beasiswa/{id}/edit', [BeasiswaController::class, 'edit'])->name('beasiswa.edit');
    Route::put('beasiswa/{id}', [BeasiswaController::class, 'update'])->name('beasiswa.update');
    Route::delete('beasiswa/{id}', [BeasiswaController::class, 'destroy'])->name('beasiswa.destroy');

    Route::get('pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');

});

Route::middleware('auth:petugas')->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/home', [App\Http\Controllers\Petugas\DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('pendaftaran', [App\Http\Controllers\Petugas\PendaftaranController::class, 'index'])->name('pendaftaran.index');
    Route::put('pendaftaran/{pendaftaran}/{status}', [App\Http\Controllers\Petugas\PendaftaranController::class, 'updateStatus'])->name('pendaftaran.update');
});


Route::group(['middleware' => 'auth:mahasiswa'], function () {
    Route::get('/mahasiswa/home', [App\Http\Controllers\Mahasiswa\DashboardController::class, 'index'])->name('mahasiswa.dashboard.index');
});

Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
