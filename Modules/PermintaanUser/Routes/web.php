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



Route::get('/user_minta', 'PermintaanUserController@index')->name('user.minta');
Route::get('/user_minta/add', 'PermintaanUserController@tambahPermintaan')->name('tambah.permintaan');
Route::get('/user_keberatan/add', 'PermintaanUserController@tambahKeberatan')->name('tambah.keberatan');
Route::post('/simpan_permintaan', 'PermintaanUserController@simpanPermintaan');
Route::get('/simpan_permintaan2', 'PermintaanUserController@simpanPermintaan2');
Route::post('/getpermintaan', 'PermintaanUserController@getPermintaan')->name('getpermintaan');
Route::post('/simpan_keberatan', 'PermintaanUserController@simpanKeberatan');

