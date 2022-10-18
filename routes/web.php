<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_perusahaan;

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

Route::get('/perusahaan', function () {
    return view('admin/v_landing');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(c_perusahaan::class)->group(function () {
    Route::get('/perusahaan/index', 'index')->name('perusahaan.index');
    Route::get('/perusahaan/create', 'create')->name('perusahaan.create');
    Route::post('/perusahaan/store', 'store')->name('perusahaan.store');
});