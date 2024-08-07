<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PembayaranController;
use App\Livewire\UploadPembayaran;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout.login');
})->name('view-login');
Route::get('/register', function () {
    return view('layout.register');
})->name('view-register');

Route::post('/login', [AuthController::class, 'login'])->name('login-post');
Route::post('/register', [AuthController::class, 'register'])->name('register-post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Pendaftar Route
Route::group(['middleware' => 'pendaftar', 'auth'], function () {
    Route::get('/dashboard-pendaftaran', function () {
        return view('user.dashboard');
    })->name('dashboard-pendaftaran');

    Route::get('/pembayaran', function () {
        return view('user.pembayaran');
    })->name('pembayaran-pendaftaran-view');
});

Route::group(['middleware' => 'payment', 'auth',], function () {
    Route::get('/form-pendaftaran', function () {
        return view('user.pendaftaran');
    })->name('form-pendaftaran-view');

    Route::get('upload-berkas', function () {
        return view('user.uploadberkas');
    })->name('upload-berkas-view');
});

//Admin Route
Route::group(['middleware' => 'admin', 'auth'], function () {
    Route::get('/dashboard-admin', function () {
        return view('admin.dashboard');
    })->name('dashboard-admin');

    Route::get('/pembayaran-admin', function () {
        return view('admin.verifikasi_pembayaran');
    })->name('verifikasi-pembayaran-admin-view');

    Route::get('/pendaftaran-admin', function () {
        return view('admin.verifikasi_pendaftaran');
    })->name('verifikasi-pendaftar-admin-view');
});
