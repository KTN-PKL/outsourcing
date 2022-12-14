<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_perusahaan;
use App\Http\Controllers\c_register;
use App\Http\Controllers\c_lowongan;
use App\Http\Controllers\c_landingpage;
use App\Http\Controllers\c_lamaran;
use App\Http\Controllers\c_wawancara;
use App\Http\Controllers\c_pelamar;


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
Route::get('/dashboard', [App\Http\Controllers\c_login::class, 'dashboard'] );
Route::post('/check', [App\Http\Controllers\c_login::class, 'check'])->name('login.check');
Route::post('/', [App\Http\Controllers\c_login::class, 'logout'])->name('user.logout');

Route::get('/link', function () {
    return view('user.v_link');
});

Route::get('/test', function () {
    return view('v_from_perusahaan');
});


Route::get('/', [App\Http\Controllers\c_landingpage::class, 'landingPage'])->name('landingPage');
Route::get('/cek', [App\Http\Controllers\c_searc::class, 'searchLowongan']);
Route::get('/lowongan/table', [App\Http\Controllers\c_searc::class, 'table']);
// Route::post('/cek', [App\Http\Controllers\c_searc::class, 'cari']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('search',[App\Http\Controllers\c_perusahaan::class, 'Search'] );
Route::get('search1',[App\Http\Controllers\c_perusahaan::class, 'cek'] );
Route::get('filter',[App\Http\Controllers\c_lowongan::class, 'filter'] );

Route::controller(c_perusahaan::class)->group(function () {
    Route::get('/admin/perusahaan', 'index')->name('admin.perusahaan');
    Route::get('/admin/perusahaan/verifikasi/{id}', 'verifikasi')->name('admin.perusahaan.verifikasi');
    Route::get('/admin/perusahaan/create', 'create')->name('perusahaan.create');
    Route::post('/admin/perusahaan/store', 'store')->name('admin.perusahaan.store');
    Route::post('/admin/perusahaan/update/{id_perusahaan}', 'update')->name('admin.perusahaan.update');
    Route::get('/daftarPerusahaan', 'daftarPerusahaan')->name('user.daftarPerusahaan');
    Route::get('/admin/lowongan', 'lowongan')->name('admin.lowongan');
    Route::get('perusahaan/read', 'read');
    Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
    Route::get('/detailperusahaan/{id_perusahaan}', 'detail')->name('detailperusahaan');
    Route::get('/admin/perusahaan/destroy/{id}', 'destroy')->name('admin.perusahaan.destoy');
    Route::post('/perusahaan/verifikasi', 'validasi')->name('perusahaan.verifikasi');
    Route::get('/admin/perusahaan/downloadakta/{akta}', 'download1')->name('admin.perusahaan.downloadakta');
    Route::get('/admin/perusahaan/downloadpkp/{pkp}', 'download2')->name('admin.perusahaan.downloadpkp');
    Route::get('/admin/perusahaan/downloadnib/{nib}', 'download3')->name('admin.perusahaan.downloadnib');
    Route::get('/perusahaan/table', 'table')->name('perusahaan.table');
});

Route::controller(c_wawancara::class)->group(function () {
    Route::get('/perusahaan/wawancara', 'index')->name('wawancara.index');
    Route::get('/perusahaan/wawancara/jadwal/{id_lowongan}', 'jadwal')->name('wawancara.jadwal');
    // Route::post('/perusahaan/wawancara/link/{id_lowongan}', 'link')->name('wawancara.link');
    Route::post('/perusahaan/wawancara/edit/{id_lamaran}', 'edit')->name('wawancara.edit');
    // Route::post('/perusahaan/wawancara/simpan/{id}', 'simpan')->name('wawancara.simpan');
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
    Route::get('/lowonganperusahaan/{id_perusahaan}', 'dataperusahaan');
    Route::get('/perusahaan/lowongan/aktif/{id_lowongan}', 'lowonganAktif')->name('lowongan.aktif');
    Route::get('/perusahaan/lowongan/nonaktif/{id_lowongan}', 'lowonganNonaktif')->name('lowongan.nonaktif');
});

Route::controller(c_register::class)->group(function () {
    Route::get('/registerpelamar', 'regpelamar');
    Route::post('/register/create', 'cpelamar')->name('register.pelamar');
    Route::post('/register/createperusahaan', 'cperusahaan')->name('register.perusahaan');
    Route::get('/registerperusahaan', 'regperusahaan');
    Route::get('/kota/{id}', 'readKota');
    
});

Route::controller(c_lamaran::class)->group(function(){
    Route::post('/detailLowongan/kirimLamaran/{id_lowongan}', 'create')->name('detailLowongan.create');
    Route::get('/lamaranSaya', 'index')->name('lamaran.index');
    Route::get('/perusahaan/pelamar/datalulus', 'datalulus')->name('perusahaan.lamaran.datalulus');
    Route::get('/perusahaan/pelamar', 'index')->name('perusahaan.index');
    Route::get('/perusahaan/dashboard', 'dashboard')->name('perusahaan.dashboard');
    Route::get('/perusahaan/pelamar/cv/{resume}', 'downloadcv')->name('perusahaan.lamaran.downloadcv');
    Route::get('/perusahaan/pelamar/lulus/{id_lamaran}', 'lulus')->name('lamaran.lulus');
    Route::get('/perusahaan/pelamar/tidak/{id_lamaran}', 'tidaklulus')->name('lamaran.tidaklulus');
    Route::get('/perusahaan/pelamar/terima/{id_lamaran}', 'terima')->name('lamaran.terima');
    Route::get('user/read', 'read');
    Route::get('user/lamaran', 'lamaran');
    Route::get('user/wawancara', 'wawancara');
    Route::get('user/wawancaranotif', 'wawancaranotif');
    Route::get('user/bacastatus', 'bacastatus');
    Route::get('user/bacawawancara', 'bacawawancara');
});

Route::controller(c_pelamar::class)->group(function () {
    Route::get('/profil', 'index');
    Route::post('/profil/edit', 'edit')->name('profil.edit');
    Route::get('/user', 'readfoto');

});

