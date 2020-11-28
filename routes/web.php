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

    Route::get('/produk_admin','ProductController@index')->name('produk.admin');
    Route::get('/produk_admin/tambah','ProductController@tambah')->name('tampiltambah.admin');
    Route::post('/produk_admin/tambah','ProductController@tambahProduk')->name('tambahproduk.admin');
    Route::get('/produk_admin/ubah/{id}','ProductController@editForm')->name('tampilubahproduk.admin');
    Route::post('/produk_admin/ubah/{id}','ProductController@updateProduk')->name('updateproduk.admin');
    Route::delete('/produk_admin/hapus/{id}','ProductController@hapusProduk')->name('hapusproduk.admin');

    Route::get('/kategori_admin','CategoryController@index')->name('tampilkategori.admin');
    Route::post('/kategori_admin/tambah','CategoryController@tambahCategory')->name('tambahkategori.admin');
    Route::get('/kategori_admin/ubah/{id}','CategoryController@editForm')->name('tampilubahkategori.admin');
    Route::post('/kategori_admin/ubah/{id}','CategoryController@updateCategory')->name('updatekategori.admin');
    Route::delete('/kategori_admin/hapus/{id}','CategoryController@hapusCategory')->name('hapuskategori.admin');
});

Route::get('/','HomeController@index')->name('home.index');
Route::get('/produk','ProductController@index')->name('produk.index');



Route::get('/home', 'HomeController@index')->name('home');
