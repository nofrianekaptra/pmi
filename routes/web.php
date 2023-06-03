<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PendataanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\user\PendonorController;
use App\Http\Controllers\user\userHomeController;
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

Route::get('/', [userHomeController::class, 'index'])->name('index');
Route::resource('pendonor', PendonorController::class);
Route::get('pasien-pmi', [userHomeController::class, 'pasien'])->name('index.pasien');

Route::get('login', [AuthController::class, 'showlogin'])->name('formLogin');
Route::post('login', [AuthController::class, 'login'])->name('loginOn');

Route::get('register', [AuthController::class, 'showreg'])->name('formReg');
Route::post('register', [AuthController::class, 'register'])->name('regOn');




Route::middleware(['auth', 'role:admin'])->prefix('master-web')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.home');

    Route::resource('kategori', KategoriController::class);

    Route::get('setting-profile', [DashboardController::class, 'settp'])->name('set_profile');
    Route::post('setting-profile/update-password', [DashboardController::class, 'updatePassword'])->name('update_pass');

    Route::controller(PendataanController::class)->group(function () {
        Route::get('pendataan', 'index')->name('pendataan.index');
        Route::get('pendataan/darah-masuk', 'darahMasuk')->name('pendataan.darahmasuk');
        Route::post('pendataan/darah-masuk/store', 'store_dmk')->name('pendataan.darahmasukstore');
        Route::get('pendataan/darah-keluar', 'darahKeluar')->name('pendataan.darahkeluar');
        Route::post('pendataan/darah-keluar/store', 'store_dklr')->name('pendataan.darahkeluarstore');
        Route::get('pendataan/darah-keluar/store/{penerima:id}/endproses', 'store_dklr_endproses')->name('pendataan.darahkeluarstoreendproses');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'signOut'])->name('logout');
});