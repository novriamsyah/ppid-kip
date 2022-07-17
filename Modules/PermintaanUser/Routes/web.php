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
