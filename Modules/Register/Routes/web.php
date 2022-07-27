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

Route::prefix('register')->group(function() {
    Route::get('/', 'RegisterController@index')->name('regis.user');
});

Route::post('/simpan_register', 'RegisterController@simpanRegister');
Route::post('/getidentitas', 'RegisterController@getidentitas')->name('getidentitas');
Route::post('/getidentitas_m', 'RegisterController@getidentitasM')->name('getidentitas_m');

//verifikasi email register
Route::get('/veri_email/{id}/{token}', 'RegisterController@verify')->name('verify_user');

//reset pass
// Route::get('/forget-password', 'ForgotPasswordController@showForget')->name('forget.password.get');
Route::post('/forget-password', 'ForgotPasswordController@submitForget')->name('forget.password.post');
Route::get('/reset-password/{token}', 'ForgotPasswordController@showReset')->name('reset.password.get');
Route::post('/reset-password', 'ForgotPasswordController@submitReset')->name('reset.password.post');

Route::group(['middleware' => ['auth2:super_admin,admin_ver']], function(){

    Route::get('/kelola_register', 'RegisterController@halamanRegister');

});