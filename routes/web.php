<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard','DashboardController@index')->name('dashboard.admin');
});

Route::get('/','HomeController@index')->name('home.index');
Route::get('/produk','ProductController@index')->name('produk.index');
Route::get('/daftar','DaftarController@index')->name('daftar.index');
Route::post('/daftar','DaftarController@daftar')->name('daftar.akun');


Route::get('/masuk','AuthController@tampilMasuk')->name('masuk.index');
Route::post('/masuk','AuthController@masuk')->name('masuk.akun');
Route::get('/keluar','AuthController@keluar')->name('keluar.akun');



Route::get('/home', 'HomeController@index')->name('home');
