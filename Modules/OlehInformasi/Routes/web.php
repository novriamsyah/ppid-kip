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

// Route::prefix('olehinformasi')->group(function() {
//     Route::get('/', 'OlehInformasiController@index');
// });

Route::group(['middleware' => ['auth2:super_admin,admin_ver']], function(){

    //kelola jenis pemohon
    Route::get('/kelola_cpi', 'OlehInformasiController@halamanCPI');
    Route::get('/tambah_cpi', 'OlehInformasiController@tambahCPI');
    Route::post('/simpan_cpi', 'OlehInformasiController@simpanCPI');
    Route::get('/edit_cpi/{id}', 'OlehInformasiController@editCPI');
    Route::post('/ubah_cpi/{id}', 'OlehInformasiController@ubahCPI');
    Route::post('/hapus_cpi/{id}', 'OlehInformasiController@hapusCPI');

});
