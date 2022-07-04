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

// Route::prefix('pemohon')->group(function() {
//     Route::get('/', 'PemohonController@index');
// });

Route::group(['middleware' => ['auth2:super_admin,admin_ver']], function(){


    //kelola jenis pemohon
    Route::get('/kelola_pemohon', 'HalJenisPemohonController@halamanPemohon');
    Route::get('/tambah_pemohon', 'HalJenisPemohonController@tambahPemohon');
    Route::post('/simpan_pemohon', 'HalJenisPemohonController@simpanPemohon');
    Route::get('/edit_pemohon/{id}', 'HalJenisPemohonController@editPemohon');
    Route::post('/ubah_pemohon/{id}', 'HalJenisPemohonController@ubahPemohon');
    Route::post('/hapus_pemohon/{id}', 'HalJenisPemohonController@hapusPemohon');

});
