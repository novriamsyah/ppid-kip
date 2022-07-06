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
    Route::get('/', 'RegisterController@index');
});

Route::post('/simpan_register', 'RegisterController@simpanRegister');
Route::post('/getidentitas', 'RegisterController@getidentitas')->name('getidentitas');