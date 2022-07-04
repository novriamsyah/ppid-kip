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

// Route::prefix('identitas')->group(function() {
//     Route::get('/', 'IdentitasController@index');
// });

Route::group(['middleware' => ['auth2:super_admin,admin_ver']], function(){

    //kelola jenis identitas
    Route::get('/kelola_identitas', 'HalJenisIdentitasController@halamanIdentitas');
    Route::get('/tambah_identitas', 'HalJenisIdentitasController@tambahIdentitas');
    Route::post('/simpan_identitas', 'HalJenisIdentitasController@simpanIdentitas');
    Route::get('/edit_identitas/{id}', 'HalJenisIdentitasController@editIdentitas');
    Route::post('/ubah_identitas/{id}', 'HalJenisIdentitasController@ubahIdentitas');
    Route::post('/hapus_identitas/{id}', 'HalJenisIdentitasController@hapusIdentitas');

});
