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



//================================= Akeses super_admin ======================================
Route::group(['middleware' => ['auth2:super_admin']], function(){
    Route::get('/kelola_user', 'HalamanUserController@halamanUser');
    Route::get('/tambah_user', 'HalamanUserController@tambahUser');
    Route::post('/simpan_user', 'HalamanUserController@simpanUser');
    Route::get('/lihat_user/{id}', 'HalamanUserController@lihatUser');
    Route::get('/edit_user/{id}', 'HalamanUserController@editUser');
    Route::post('/ubah_user/{id}', 'HalamanUserController@ubahUser');
    Route::post('/hapus_user/{id}', 'HalamanUserController@hapusUser');

});


//================================= Akeses Admin ============================================
Route::group(['middleware' => ['auth2:super_admin,admin_ver']], function(){
    //dahboard
    Route::get('/dashboard', 'HalDashboardController@halaman_dashboard'); 

    //profil
    Route::get('/kelola_profil', 'HalProfilController@halamanProfil'); 
    Route::post('/update_profil', 'HalProfilController@updateProfil'); 
    Route::post('/ubah_password/{id}', 'HalProfilController@ubahPassword'); 
});


