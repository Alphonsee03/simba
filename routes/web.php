<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BeasiswaController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\Admin\SawController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;
use App\Http\Controllers\Petugas\SeleksiController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'submit'])->name('auth.submit');
Route::get('/registrasi', [AuthController::class, 'register'])->name('register');
Route::post('/registrasi', [AuthController::class, 'submitregister'])->name('register.submit');

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/home', [DashboardController::class, 'dashboard'])->name('dashboard');

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

    Route::get('beasiswa/{id}/kriteria', [App\Http\Controllers\Admin\KriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('beasiswa/{id}/kriteria', [App\Http\Controllers\Admin\KriteriaController::class, 'store'])->name('kriteria.store');

    Route::get('hasilsaw', [SawController::class, 'index'])->name('hasilsaw.index');

    Route::get('pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');

});

Route::middleware('auth:petugas')->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/home', [App\Http\Controllers\Petugas\DashboardController::class, 'index'])->name('dashboard.index');
        //menampilkan halalaman daftar users
    Route::get('/users', [UserController::class, 'indexPetugas'])->name('users.index');
        // menampilkan halaman pendaftaran, untuk di verifikasi
    Route::get('validasi', [App\Http\Controllers\Petugas\PendaftaranController::class, 'index'])->name('pendaftaran.index');
        //untuk memproses tombol verifikasi
    Route::put('validasi/{pendaftaran}/{status}', [App\Http\Controllers\Petugas\PendaftaranController::class, 'updateStatus'])->name('pendaftaran.update');
        // menampilkan halaman proses seleksi SAW
    Route::get('seleksi', [PetugasController::class, 'index'])->name('seleksi.index');
            // Daftar Mahasiswa beserta ranking yang sudah diproses
    Route::get('/seleksi/hasil', [PetugasController::class, 'daftarHasilSeleksi'])->name('seleksi.hasil');
        // Export PDF
    Route::get('seleksi/export-pdf', [PetugasController::class, 'exportPDF'])->name('seleksi.export.pdf');
        //Untuk menampilkan halaman proses seleksi, dan rangking sementara
    Route::get('seleksi/{beasiswa_id}', [SeleksiController::class, 'prosesSeleksi'])->name('seleksi.proses');
        // Untuk menyimpan hasil proses seleksi
    Route::post('seleksi/{beasiswa_id}/proses', [SeleksiController::class, 'store'])->name('seleksi.store');
        
    

});





Route::middleware('auth:mahasiswa')->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/home', [App\Http\Controllers\Mahasiswa\DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('beasiswa', [App\Http\Controllers\Mahasiswa\BeasiswaController::class, 'index'])->name('beasiswa.index');
    Route::post('beasiswa/{id}/daftar', [App\Http\Controllers\Mahasiswa\BeasiswaController::class, 'daftar'])->name('beasiswa.daftar');
    Route::get('pendaftaran', [App\Http\Controllers\Mahasiswa\BeasiswaController::class, 'status'])->name('pendaftaran.status');

    Route::get('alternatif/form', [MahasiswaController::class, 'alternatifForm'])->name('alternatif.form');

    Route::post('alternatif', [MahasiswaController::class, 'alternatifStore'])->name('alternatif.store');
    Route::get('/seleksi/status', [MahasiswaController::class, 'statusSeleksi'])->name('seleksi.status');

});




Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
