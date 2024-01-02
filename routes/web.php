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
    // Home
    Route::get('/dashboard', [DashboardController::class, 'dashboard'] )->name('dashboard');
    Route::get('/edit-profil', [DashboardController::class, 'editProfil'] )->name('dashboard.edit-profil');
    Route::post('/edit-profil', [DashboardController::class, 'updateProfil'] )->name('dashboard.update-profil');
    // SuratMasuk
    Route::get('/surat-masuk', [DashboardController::class, 'suratMasuk'] )->name('dashboard.surat-masuk');
    Route::get('/surat-masuk/add', [DashboardController::class, 'addSuratMasuk'] )->name('dashboard.surat-masuk.add');
    Route::post('/surat-masuk/add', [DashboardController::class, 'storeSuratMasuk'] )->name('dashboard.surat-masuk.store');
    Route::get('/surat-masuk/edit/{id}', [DashboardController::class, 'editSuratMasuk'] )->name('dashboard.surat-masuk.edit');
    Route::post('/surat-masuk/edit/{id}', [DashboardController::class, 'updateSuratMasuk'] )->name('dashboard.surat-masuk.update');
    Route::delete('/surat-masuk/delete/{id}', [DashboardController::class, 'deleteSuratMasuk'] )->name('dashboard.surat-masuk.delete');
    // Disposisi
    Route::get('/disposisi/add', [DashboardController::class, 'addDisposisi'] )->name('dashboard.disposisi.add');
    Route::post('/disposisi/add', [DashboardController::class, 'storeDisposisi'] )->name('dashboard.disposisi.store');
    // SuratKeluar
    Route::get('/surat-keluar', [DashboardController::class, 'suratKeluar'] )->name('dashboard.surat-keluar');
    Route::get('/surat-keluar/add', [DashboardController::class, 'addSuratKeluar'] )->name('dashboard.surat-keluar.add');
    Route::post('/surat-keluar/add', [DashboardController::class, 'storeSuratKeluar'] )->name('dashboard.surat-keluar.store');
    Route::get('/surat-keluar/edit/{id}', [DashboardController::class, 'editSuratKeluar'] )->name('dashboard.surat-keluar.edit');
    Route::post('/surat-keluar/edit/{id}', [DashboardController::class, 'updateSuratKeluar'] )->name('dashboard.surat-keluar.update');
    Route::delete('/surat-keluar/delete/{id}', [DashboardController::class, 'deleteSuratKeluar'] )->name('dashboard.surat-keluar.delete');
    // SuratRegisterKeluar
    Route::get('/surat-register-keluar', [DashboardController::class, 'suratRegisterKeluar'] )->name('dashboard.surat-register-keluar');
    Route::get('/surat-register-keluar/add', [DashboardController::class, 'addSuratRegisterKeluar'] )->name('dashboard.surat-register-keluar.add');
    Route::post('/surat-register-keluar/add', [DashboardController::class, 'storeSuratRegisterKeluar'] )->name('dashboard.surat-register-keluar.store');
    Route::get('/surat-register-keluar/edit/{id}', [DashboardController::class, 'editSuratRegisterKeluar'] )->name('dashboard.surat-register-keluar.edit');
    Route::post('/surat-register-keluar/edit/{id}', [DashboardController::class, 'updateSuratRegisterKeluar'] )->name('dashboard.surat-register-keluar.update');
    Route::delete('/surat-register-keluar/delete/{id}', [DashboardController::class, 'deleteSuratRegisterKeluar'] )->name('dashboard.surat-register-keluar.delete');
    // BukuAgenda
    Route::get('/buku-agenda', [DashboardController::class, 'bukuAgenda'] )->name('dashboard.buku-agenda');
    Route::post('/buku-agenda', [DashboardController::class, 'bukuAgendaCetak'] )->name('dashboard.buku-agenda.cetak');
    // JadwalRetensi
    Route::get('/jadwal-retensi', [DashboardController::class, 'jadwalRetensi'] )->name('dashboard.jadwal-retensi');
    Route::post('/jadwal-retensi', [DashboardController::class, 'hapusJadwalRetensi'] )->name('dashboard.jadwal-retensi.delete');




});

Route::get('/logout', [AuthController::class, 'logout'] )->name('logout');
