<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\CrispController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\Rel_AlternatifController;
use App\Http\Controllers\Rel_CrispController;
use App\Http\Controllers\Rel_KriteriaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'level'])->group(
    function () {
        Route::get('/', [HomeController::class, 'show'])->name('home')->middleware('auth');
        Route::get('/home', [HomeController::class, 'show'])->name('home')->middleware('auth');

        Route::get('/alternatif/cetak', [AlternatifController::class, 'cetak'])->name('alternatif.cetak');
        Route::resource('/alternatif', AlternatifController::class);
        Route::get('/kriteria/cetak', [KriteriaController::class, 'cetak'])->name('kriteria.cetak');
        Route::resource('/kriteria', KriteriaController::class);
        Route::get('/crisp/cetak', [CrispController::class, 'cetak'])->name('crisp.cetak');
        Route::resource('/crisp', CrispController::class);
        Route::get('/rel_alternatif/cetak', [Rel_AlternatifController::class, 'cetak'])->name('rel_alternatif.cetak');
        Route::resource('/rel_alternatif', Rel_AlternatifController::class);
        Route::get('/hitung', [HitungController::class, 'index'])->name('hitung.index');
        Route::get('/hitung/cetak', [HitungController::class, 'cetak'])->name('hitung.cetak');

        Route::get('/rel_kriteria', [Rel_KriteriaController::class, 'index'])->name('rel_kriteria.index');
        Route::post('/rel_kriteria', [Rel_KriteriaController::class, 'simpan'])->name('rel_kriteria.simpan');
        Route::get('/rel_crisp', [Rel_CrispController::class, 'index'])->name('rel_crisp.index');
        Route::post('/rel_crisp', [Rel_CrispController::class, 'simpan'])->name('rel_crisp.simpan');

        Route::get('/user/profil', [UserController::class, 'profil'])->name('user.profil');
        Route::post('/user/profil', [UserController::class, 'profilUpdate'])->name('user.profil.update');
        Route::get('/user/password', [UserController::class, 'password'])->name('user.password');
        Route::post('/user/password', [UserController::class, 'passwordUpdate'])->name('user.password.update');
        Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
        Route::get('/user/cetak', [UserController::class, 'cetak'])->name('user.cetak');
        Route::resource('user', UserController::class);
    }
);
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'loginAction'])->name('login.action');
