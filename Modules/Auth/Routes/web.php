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

Route::prefix('auth')->group(function() {
    Route::get('/login', 'AuthController@halaman_login')->name('auth.login');
    Route::post('/register', 'AuthController@halaman_register')->name('auth.register');
    Route::post('/login_verifikasi', 'AuthController@verifikasiLogin')->name('auth.verifikasi');
    Route::get('/logout', 'AuthController@prosesLogout');
});



Route::group(['middleware' => ['auth', 'auth2:superadmin']], function(){
    // => Halaman Profil
    Route::get('/dashboard', 'HalDashboardController@home'); 
});

Route::group(['middleware' => ['auth', 'checkRole:superadmin,admin']], function(){
    // => Halaman Profil
        // Route::get('/admin', 'HalDashboardController@home');
});


