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

// Route::prefix('keberatan')->group(function() {
//     Route::get('/', 'KeberatanController@index');
// });

Route::group(['middleware' => ['auth2:super_admin,admin_ver']], function(){


    //kelola jenis pemohon
    Route::get('/kelola_keberatan', 'KeberatanController@halamanKeberatan');
    Route::get('/tambah_keberatan', 'KeberatanController@tambahKeberatan');
    Route::post('/simpan_keberatan', 'KeberatanController@simpanKeberatan');
    Route::get('/edit_keberatan/{id}', 'KeberatanController@editKeberatan');
    Route::post('/ubah_keberatan/{id}', 'KeberatanController@ubahKeberatan');
    Route::post('/hapus_keberatan/{id}', 'KeberatanController@hapusKeberatan');

});

