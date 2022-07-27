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

// Route::prefix('template')->group(function() {
//     Route::get('/', 'TemplateController@index');
// });

Route::group(['middleware' => ['auth2:super_admin,admin_ver']], function(){

    Route::get('/kelola_template', 'TemplateController@halamanTemplate');
    Route::get('/tambah_template', 'TemplateController@tambahTemplate');
    Route::post('/simpan_template', 'TemplateController@simpanTemplate');
    Route::get('/lihat_isi/{id}', 'TemplateController@lihatTemplate');
    Route::get('/edit_template/{id}', 'TemplateController@editTemplate');
    Route::get('/edit_template_verif/{id}', 'TemplateController@editTemplateverif');
    Route::get('/edit_template_forgot/{id}', 'TemplateController@editTemplateforgot');
    Route::post('/ubah_template/{id}', 'TemplateController@ubahTemplate');
    Route::post('/hapus_template/{id}', 'TemplateController@hapusTemplate');

});
