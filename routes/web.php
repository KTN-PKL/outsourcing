<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_perusahaan;
use App\Http\Controllers\c_register;
use App\Http\Controllers\c_lowongan;
use App\Http\Controllers\c_landingpage;
use App\Http\Controllers\c_lamaran;


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



Route::get('/test', function () {
    return view('v_from_perusahaan');
});

Route::get('/', [App\Http\Controllers\c_landingpage::class, 'landingPage'])->name('landingPage');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(c_perusahaan::class)->group(function () {
    Route::get('/admin/perusahaan', 'index')->name('admin.perusahaan');
    Route::get('/admin/perusahaan/verifikasi/{id}', 'verifikasi')->name('admin.perusahaan.verifikasi');
    Route::get('/admin/perusahaan/create', 'create')->name('perusahaan.create');
    Route::post('/admin/perusahaan/store', 'store')->name('admin.perusahaan.store');
    Route::post('/admin/perusahaan/update/{id_perusahaan}', 'update')->name('admin.perusahaan.update');
    Route::get('/daftarPerusahaan', 'daftarPerusahaan')->name('user.daftarPerusahaan');
    Route::get('/admin/lowongan', 'lowongan')->name('admin.lowongan');
    Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
    Route::get('/admin/perusahaan/destroy/{id}', 'destroy')->name('admin.perusahaan.destoy');
});

Route::controller(c_lowongan::class)->group(function () {
    Route::get('/perusahaan/lowongan', 'indexperusahaan')->name('perusahaan.lowongan.index');
    Route::get('/perusahaan/lowongan/create', 'create')->name('perusahaan.lowongan.create');
    Route::post('/perusahaan/lowongan/store', 'store')->name('perusahaan.lowongan.store');
    Route::post('/perusahaan/lowongan/update/{id_lowongan}', 'update')->name('perusahaan.lowongan.update');
    Route::get('/perusahaan/lowongan/edit/{id_lowongan}', 'edit')->name('perusahaan.lowongan.edit');
    Route::get('/perusahaan/lowongan/destroy/{id_lowongan}', 'destroy')->name('perusahaan.lowongan.destoy');
    Route::get('/detailLowongan/{id_lowongan}', 'detailLowongan');
    Route::get('/admin/lowongan/{id_perusahaan}', 'indexadmin')->name('admin.lowongan.perusahaan');
    Route::post('/cari', 'cari')->name('cari');
});

Route::controller(c_register::class)->group(function () {
    Route::get('/registerpelamar', 'regpelamar');
    Route::post('/register/create', 'cpelamar')->name('register.pelamar');
    Route::post('/register/createperusahaan', 'cperusahaan')->name('register.perusahaan');
    Route::get('/registerperusahaan', 'regperusahaan');
});

Route::controller(c_lamaran::class)->group(function(){
    Route::post('/detailLowongan/kirimLamaran', 'create')->name('detailLowongan.create');
    Route::get('/lamaranSaya', 'index')->name('lamaran.index');
    Route::get('/perusahaan/pelamar/datalulus', 'datalulus')->name('perusahaan.lamaran.datalulus');
    Route::get('/perusahaan/pelamar', 'index')->name('perusahaan.index');
    Route::get('/perusahaan/pelamar/lulus/{id_lamaran}', 'lulus')->name('lamaran.lulus');
    Route::get('/perusahaan/pelamar/tidak/{id_lamaran}', 'tidaklulus')->name('lamaran.tidaklulus');
});

