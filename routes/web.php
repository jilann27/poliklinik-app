<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
 //   return view('welcome');
//});
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/polis', fn () => 'Halaman Poli (menyusul)')->name('polis.index');
    Route::get('/dokter', fn () => 'Halaman Dokter (menyusul)')->name('dokter.index');
    Route::get('/pasien', fn () => 'Halaman Pasien (menyusul)')->name('pasien.index');
    Route::get('/obat', fn () => 'Halaman Obat (menyusul)')->name('obat.index');
});

Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {
    Route::get('/dashboard', function () {
        return view('dokter.dashboard');
    })->name('dokter.dashboard');

    Route::get('/jadwal-periksa', fn () => 'Halaman Jadwal Periksa (menyusul)')->name('jadwal-periksa.index');
    Route::get('/periksa-pasien', fn () => 'Halaman Periksa Pasien (menyusul)')->name('periksa-pasien.index');
    Route::get('/riwayat-pasien', fn () => 'Halaman Riwayat Pasien (menyusul)')->name('riwayat-pasien.index');
});


Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->group(function () {
    Route::get('/dashboard', function () {
        return view('pasien.dashboard');
    })->name('pasien.dashboard');

    Route::get('/daftar', fn () => 'Halaman Pendaftaran Periksa (menyusul)')->name('pasien.daftar');
});