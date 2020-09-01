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
    return view('welcome');
});

Route::get('/logout', function () {
    \Auth::logout();
    return redirect('/login');
});  
//Registrasi
Route::get('/eclaim','RegistrationController@create');
Route::post('/eclaim', 'RegistrationController@store');
Route::get('/eclaim/upload-dokumen/{id}', 'UploadDokumenController@hal');
Route::post('/eclaim/upload-dokumen', 'UploadDokumenController@store');

//Verifikasi
Route::get('/verifikasi', 'RegistrationController@index');

Auth::routes();
Route::get('/admin/approve/{id}', 'RegistrationController@approved');
Route::get('/nilai/{id}','RegistrationController@editnilai');
Route::post('/storevalue ', 'RegistrationController@storevalue');
Route::get('/home', 'HomeController@index')->name('home');
