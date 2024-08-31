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

Route::get('/', function () {
    return view('portal');
})->name('portal');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Auth::routes();
Route::post('login-check', 'Auth\LoginController@login')->name('loginCheck');
Route::post('/password/reset_custom', 'Auth\LoginController@reset_custom');

Route::get('/home', 'Backend\HomeController@index')->name('home');

// User Right 
Route::get('/user-right', 'Backend\UserRightController@index')->name('userRight.index');
Route::post('/user-right/list', 'Backend\UserRightController@ajaxList')->name('userRight.ajaxList');
Route::get('/user-right/create', 'Backend\UserRightController@create')->name('userRight.create');
Route::post('/user-right/store', 'Backend\UserRightController@store')->name('userRight.store');
Route::delete('/user-right/{id}/destroy', 'Backend\UserRightController@destroy')->name('userRight.destroy');

Route::get('/user/form_department/{id}/{area_kerja_id}', 'Backend\UserController@form_department');
Route::post('/user/ajax_list', ['as'=>'user.ajax_list', 'uses'=>'Backend\UserController@ajax_list']);
Route::resource('/user', 'Backend\UserController');

Route::post('/department/ajax_list', ['as'=>'department.ajax_list', 'uses'=>'Backend\DepartmentController@ajax_list']);
Route::resource('/department', 'Backend\DepartmentController');

Route::post('/jabatan/ajax_list', ['as'=>'jabatan.ajax_list', 'uses'=>'Backend\JabatanController@ajax_list']);
Route::resource('/jabatan', 'Backend\JabatanController');


Route::post('/delay_range/ajax_list', ['as'=>'delay_range.ajax_list', 'uses'=>'Backend\DelayRangeController@ajax_list']);
Route::resource('/delay_range', 'Backend\DelayRangeController');

Route::post('/kategori_berita/ajax_list', ['as'=>'kategori_berita.ajax_list', 'uses'=>'Backend\KategoriBeritaController@ajax_list']);
Route::resource('/kategori_berita', 'Backend\KategoriBeritaController');

Route::post('/berita/update_berita/{id}', ['as'=>'berita.update_berita', 'uses'=>'Backend\BeritaController@update_berita']);
Route::post('/berita/ajax_list', ['as'=>'berita.ajax_list', 'uses'=>'Backend\BeritaController@ajax_list']);
Route::resource('/berita', 'Backend\BeritaController');

Route::post('/pengumuman/update_pengumuman/{id}', ['as'=>'pengumuman.update_pengumuman', 'uses'=>'Backend\PengumumanController@update_pengumuman']);
Route::post('/pengumuman/ajax_list', ['as'=>'pengumuman.ajax_list', 'uses'=>'Backend\PengumumanController@ajax_list']);
Route::resource('/pengumuman', 'Backend\PengumumanController');

// dms
Route::post('/user_dc/ajax_list', ['as'=>'user_dc.ajax_list', 'uses'=>'Backend\UserDcController@ajax_list']);
Route::resource('/user_dc', 'Backend\UserDcController');


Route::get('/dms-user', 'Backend\UserDcController@userLevel')->name('dms.userLevel');
Route::post('/dms-user', 'Backend\UserDcController@ajaxListUserLevel')->name('dms.ajaxListUserLevel');
Route::get('/dms-user/create', 'Backend\UserDcController@createUserLevel')->name('dms.createUserLevel');
Route::post('/dms-user/store', 'Backend\UserDcController@storeUserLevel')->name('dms.storeUserLevel');
Route::get('/dms-user/{user_id}/edit', 'Backend\UserDcController@editUserLevel')->name('dms.editUserLevel');
Route::put('/dms-user/{user_id}/update', 'Backend\UserDcController@updateUserLevel')->name('dms.updateUserLevel');
Route::put('/dms-user/{user_id}/destroy', 'Backend\UserDcController@destroyUserLevel')->name('dms.destroyUserLevel');

// dw
Route::get('/dw_admin_department', 'Backend\DwAdminDepartmentController@index')->name('dw_admin_department');
Route::post('/dw_admin_department/ajax_list', 'Backend\DwAdminDepartmentController@ajax_list')->name('dw_admin_department.ajax_list');
Route::get('/dw_admin_department/create', 'Backend\DwAdminDepartmentController@create')->name('dw_admin_department.create');
Route::post('/dw_admin_department/store', 'Backend\DwAdminDepartmentController@store')->name('dw_admin_department.store');
Route::delete('/dw_admin_department/{id}/destroy', 'Backend\DwAdminDepartmentController@destroy')->name('dw_admin_department.destroy');

// library
Route::post('/admin_department/ajax_list', ['as'=>'admin_department.ajax_list', 'uses'=>'Backend\AdminDepartmentController@ajax_list']);
Route::resource('/admin_department', 'Backend\AdminDepartmentController');

Route::get('/reminder_email_template', ['as'=>'reminder_email_template.index', 'uses'=>'Backend\ReminderEmailTemplateController@index']);
Route::put('/reminder_email_template/update/{kode}', ['as'=>'reminder_email_template.update', 'uses'=>'Backend\ReminderEmailTemplateController@update']);

// signature
Route::post('/signature_admin_department/ajax_list', ['as'=>'signature_admin_department.ajax_list', 'uses'=>'Backend\SignatureAdminDepartmentController@ajax_list']);
Route::resource('/signature_admin_department', 'Backend\SignatureAdminDepartmentController');


// kalibrasi
Route::get('/kalibrasi-user', 'Backend\KalibrasiController@userLevel')->name('kalibrasi.userLevel');
Route::post('/kalibrasi-user', 'Backend\KalibrasiController@ajaxListUserLevel')->name('kalibrasi.ajaxListUserLevel');
Route::get('/kalibrasi-user/create', 'Backend\KalibrasiController@createUserLevel')->name('kalibrasi.createUserLevel');
Route::post('/kalibrasi-user/store', 'Backend\KalibrasiController@storeUserLevel')->name('kalibrasi.storeUserLevel');
Route::get('/kalibrasi-user/{user_id}/edit', 'Backend\KalibrasiController@editUserLevel')->name('kalibrasi.editUserLevel');
Route::put('/kalibrasi-user/{user_id}/update', 'Backend\KalibrasiController@updateUserLevel')->name('kalibrasi.updateUserLevel');
Route::put('/kalibrasi-user/{user_id}/destroy', 'Backend\KalibrasiController@destroyUserLevel')->name('kalibrasi.destroyUserLevel');

// reagensia
Route::get('/reagensia-user', 'Backend\ReagensiaController@userLevel')->name('reagensia.userLevel');
Route::post('/reagensia-user', 'Backend\ReagensiaController@ajaxListUserLevel')->name('reagensia.ajaxListUserLevel');
Route::get('/reagensia-user/create', 'Backend\ReagensiaController@createUserLevel')->name('reagensia.createUserLevel');
Route::post('/reagensia-user/store', 'Backend\ReagensiaController@storeUserLevel')->name('reagensia.storeUserLevel');
Route::get('/reagensia-user/{user_id}/edit', 'Backend\ReagensiaController@editUserLevel')->name('reagensia.editUserLevel');
Route::put('/reagensia-user/{user_id}/update', 'Backend\ReagensiaController@updateUserLevel')->name('reagensia.updateUserLevel');
Route::put('/reagensia-user/{user_id}/destroy', 'Backend\ReagensiaController@destroyUserLevel')->name('reagensia.destroyUserLevel');

// stability
Route::get('/stability-user', 'Backend\StabilityController@userLevel')->name('stability.userLevel');
Route::post('/stability-user', 'Backend\StabilityController@ajaxListUserLevel')->name('stability.ajaxListUserLevel');
Route::get('/stability-user/create', 'Backend\StabilityController@createUserLevel')->name('stability.createUserLevel');
Route::post('/stability-user/store', 'Backend\StabilityController@storeUserLevel')->name('stability.storeUserLevel');
Route::get('/stability-user/{user_id}/edit', 'Backend\StabilityController@editUserLevel')->name('stability.editUserLevel');
Route::put('/stability-user/{user_id}/update', 'Backend\StabilityController@updateUserLevel')->name('stability.updateUserLevel');
Route::put('/stability-user/{user_id}/destroy', 'Backend\StabilityController@destroyUserLevel')->name('stability.destroyUserLevel');