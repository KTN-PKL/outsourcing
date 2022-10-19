<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_perusahaan;
use App\Http\Controllers\c_register;

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

Route::get('/', function () {
    return view('user/user');
});

Route::get('/test', function () {
    return view('v_from_perusahaan');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(c_perusahaan::class)->group(function () {
    Route::get('/perusahaan/index', 'index')->name('perusahaan.index');
    Route::get('/perusahaan/create', 'create')->name('perusahaan.create');
    Route::post('/perusahaan/store', 'store')->name('perusahaan.store');
});

Route::controller(c_register::class)->group(function () {
    Route::get('/registerpelamar', 'regpelamar');
    Route::post('/register/create', 'cpelamar')->name('register.pelamar');
    Route::post('/register/createperusahaan', 'cperusahaan')->name('register.perusahaan');
    Route::get('/registerperusahaan', 'regperusahaan');
});