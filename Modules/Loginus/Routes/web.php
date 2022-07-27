<?php

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

Route::prefix('loginus')->group(function() {
    Route::get('/', 'LoginusController@index')->name('loginus');
});

Route::post('/verifikasi_us', 'LoginusController@verifikasiLogin')->name('login.verifikasius');
Route::get('/signout', 'LoginusController@signout')->name('signout.user');
Route::get('/', 'LoginusController@halaman_utama')->name('hal.utama');
Route::get('/profil_user', 'LoginusController@profilUser')->name('profil_us');
Route::post('/edit_profil_user', 'LoginusController@profilUserEdit')->name('edit_profil_user');

// Route::middleware(['sess_user'])->get()