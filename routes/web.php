<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Models\Obat;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function ()
{
    Route::get('/dashboard', function (){
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::resource('polis', PoliController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('pasien', PasienController::class);
    Route::resource('obat', ObatController::class);
});

//Dokter
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function ()
{
    Route::get('/dashboard', function (){
        return view('dokter.dashboard');
    })->name('dokter.dashboard');
});

//Pasien
Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->group(function ()
{
    Route::get('/dashboard', function (){
        return view('pasien.dashboard');
    })->name('pasien.dashboard');

     Route::get('/daftar', function () {
        return view('pasien.daftar');
    })->name('pasien.daftar');
});