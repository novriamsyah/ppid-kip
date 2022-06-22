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

// Route::get('/exam', 'HalDashboardController@home'); 

Route::group(['middleware' => ['auth2:super_admin']], function(){
    Route::get('/dashboard', 'HalDashboardController@home'); 
    Route::get('/s_admin', 'HalDashboardController@s_admin');
});

Route::group(['middleware' => ['auth2:super_admin,admin_ver']], function(){
        Route::get('/dashboard', 'HalDashboardController@home'); 
        Route::get('/admin', 'HalDashboardController@admin');
});


