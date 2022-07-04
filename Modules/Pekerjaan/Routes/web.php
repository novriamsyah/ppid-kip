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

// Route::prefix('pekerjaan')->group(function() {
//     Route::get('/', 'PekerjaanController@index');
// });

//================================= Akeses Admin ============================================
Route::group(['middleware' => ['auth2:super_admin,admin_ver']], function(){

    //kelola jenis pekerjaan
    Route::get('/kelola_pekerjaan', 'HalJenisPekerjaanController@halamanPekerjaan')->name('kelola.kerja');
    Route::get('/tambah_pekerjaan', 'HalJenisPekerjaanController@tambahPekerjaan');
    Route::post('/simpan_pekerjaan', 'HalJenisPekerjaanController@simpanPekerjaan');
    Route::get('/edit_pekerjaan/{id}', 'HalJenisPekerjaanController@editPekerjaan');
    Route::post('/ubah_pekerjaan/{id}', 'HalJenisPekerjaanController@ubahPekerjaan');
    Route::post('/hapus_pekerjaan/{id}', 'HalJenisPekerjaanController@hapusPekerjaan');
});
