<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

// ROUTE DEVELOP UI
Route::view('/suratmasukui', 'suratmasuk')->name('test');


Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return redirect('/login');
    });
    Route::get('/login', [AuthController::class, 'login'] )->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'] )->name('auth.authenticate');
    Route::get('/register', [AuthController::class, 'register'] )->name('register');
    Route::post('/register', [AuthController::class, 'store'] )->name('auth.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'] )->name('dashboard');
    Route::get('/surat-masuk', [DashboardController::class, 'suratMasuk'] )->name('dashboard.surat-masuk');
    Route::get('/surat-masuk/add', [DashboardController::class, 'addSuratMasuk'] )->name('dashboard.surat-masuk.add');
    Route::post('/surat-masuk/add', [DashboardController::class, 'storeSuratMasuk'] )->name('dashboard.surat-masuk.store');
    Route::get('/surat-masuk/edit/{id}', [DashboardController::class, 'editSuratMasuk'] )->name('dashboard.surat-masuk.edit');
    Route::get('/disposisi/add', [DashboardController::class, 'addDisposisi'] )->name('dashboard.disposisi.add');
});

Route::get('/logout', [AuthController::class, 'logout'] )->name('logout');
