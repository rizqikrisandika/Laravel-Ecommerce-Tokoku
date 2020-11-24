<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index')->name('home.index');
Route::get('/produk','ProductController@index')->name('produk.index');
Route::get('/daftar','DaftarController@index')->name('daftar.index');
Route::get('/dashboard', function () {
    return view('admin.index');
});

Route::get('/masuk','AuthController@tampilDaftar')->name('masuk.index');
Route::post('/masuk','AuthController@masuk')->name('masuk.akun');
Route::get('/keluar','AuthController@keluar')->name('keluar.akun');
