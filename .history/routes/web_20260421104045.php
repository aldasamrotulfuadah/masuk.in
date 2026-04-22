<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhatsAppController;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/coba', function () {
    return view('coba');
});

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProses'])->name('loginProses');

//user
Route::get('/user', [UserController::class, 'user'])->name('user');
Route::get('/user/create', [UserController::class, 'create'])->name('userCreate');
Route::post('/user/store', [UserController::class, 'store'])->name('userStore');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('checkLogin')->group(function(){
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Surat Masuk
    Route::get('/suratmasuk', [SuratMasukController::class, 'index'])->name('suratmasuk');
    Route::get('/suratmasuk/create', [SuratMasukController::class, 'create'])->name('suratmasukCreate');
    Route::post('/suratmasuk/store', [SuratMasukController::class, 'store'])->name('suratmasukStore');
    Route::get('/suratmasuk/edit/{id}', [SuratMasukController::class, 'edit'])->name('suratmasukEdit');
    Route::post('/suratmasuk/update/{id}', [SuratMasukController::class, 'update'])->name('suratmasukUpdate');
    Route::delete('/suratmasuk/destroy/{id}', [SuratMasukController::class, 'destroy'])->name('suratmasukDestroy');
    

    // Surat Keluar
    Route::get('/suratkeluar', [SuratKeluarController::class, 'index'])->name('suratkeluar');
     Route::get('/suratkeluar/create', [SuratKeluarController::class, 'create'])->name('suratkeluarCreate');
    Route::post('/suratkeluar/store', [SuratKeluarController::class, 'store'])->name('suratkeluarStore');
    Route::get('/suratkeluar/edit/{id}', [SuratKeluarController::class, 'edit'])->name('suratkeluarEdit');
    Route::post('/suratkeluar/update/{id}', [SuratKeluarController::class, 'update'])->name('suratkeluarUpdate');
    Route::delete('/suratkeluar/destroy/{id}', [SuratKeluarController::class, 'destroy'])->name('suratkeluarDestroy');

});

    //Route::get('/surat-masuk/kirim-wa/{id}', [SuratMasukController::class, 'kirimWaSurat'])->name('kirimWaSurat');


