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

// Route::prefix('ppidtujuan')->group(function() {
//     Route::get('/', 'PPIDtujuanController@index');
// });

Route::group(['middleware' => ['auth2:super_admin,admin_ver']], function(){

    //kelola jenis pemohon
    Route::get('/kelola_tujuan_ppid', 'PPIDtujuanController@halamanTppid');
    Route::get('/tambah_tujuan_ppid', 'PPIDtujuanController@tambahTppid');
    Route::post('/simpan_tujuan_ppid', 'PPIDtujuanController@simpanTppid');
    Route::get('/edit_tujuan_ppid/{id}', 'PPIDtujuanController@editTppid');
    Route::post('/ubah_tujuan_ppid/{id}', 'PPIDtujuanController@ubahTppid');
    Route::post('/hapus_tujuan_ppid/{id}', 'PPIDtujuanController@hapusTppid');

});
