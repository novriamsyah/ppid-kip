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

// Route::prefix('dapatinformasi')->group(function() {
//     Route::get('/', 'DapatInformasiController@index');
// });

Route::group(['middleware' => ['auth2:super_admin,admin_ver']], function(){


    //kelola jenis pemohon
    Route::get('/kelola_cdi', 'DapatInformasiController@halamanCDI');
    Route::get('/tambah_cdi', 'DapatInformasiController@tambahCDI');
    Route::post('/simpan_cdi', 'DapatInformasiController@simpanCDI');
    Route::get('/edit_cdi/{id}', 'DapatInformasiController@editCDI');
    Route::post('/ubah_cdi/{id}', 'DapatInformasiController@ubahCDI');
    Route::post('/hapus_cdi/{id}', 'DapatInformasiController@hapusCDI');

});
