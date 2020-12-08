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

    Route::get('/dashboard/produk','ProductController@index')->name('produk.admin');
    Route::get('/dashboard/produk/tambah','ProductController@tambahForm')->name('tampiltambah.admin');
    Route::post('/dashboard/produk/tambah','ProductController@tambahProduk')->name('tambahproduk.admin');
    Route::get('/dashboard/produk/ubah/{id}','ProductController@editForm')->name('tampilubahproduk.admin');
    Route::post('/dashboard/produk/ubah/{id}','ProductController@updateProduk')->name('updateproduk.admin');
    Route::delete('/dashboard/produk/hapus/{id}','ProductController@hapusProduk')->name('hapusproduk.admin');
    Route::get('/dashboard/produk/detail/{id}','ProductController@detailProduk')->name('detailproduk.admin');

    Route::get('/dashboard/kategori','CategoryController@index')->name('tampilkategori.admin');
    Route::post('/dashboard/kategori/tambah','CategoryController@tambahCategory')->name('tambahkategori.admin');
    Route::get('/dashboard/kategori/ubah/{id}','CategoryController@editForm')->name('tampilubahkategori.admin');
    Route::post('/dashboard/kategori/ubah/{id}','CategoryController@updateCategory')->name('updatekategori.admin');
    Route::delete('/dashboard/kategori/hapus/{id}','CategoryController@hapusCategory')->name('hapuskategori.admin');

    Route::get('/dashboard/pengguna','UserController@index')->name('user.admin');

    Route::get('/dashboard/pemesanan','OrderController@index')->name('pemesanan.admin');
    Route::get('/dashboard/pemesanan/{id}','OrderController@detail')->name('pemesananDetail.admin');
});

Route::get('/','HomeController@index')->name('home.index');

Route::get('/produk','HomeController@produk')->name('produk.index');
Route::get('/produk/detail/{id}','HomeController@show')->name('detailproduk.index');

Route::get('/keranjang','CartController@keranjang')->name('keranjang.index');
Route::post('/keranjang/{id}','CartController@order')->name('tambahkeranjang.index');
Route::delete('/keranjang/{id}','CartController@hapusKeranjang')->name('hapuskeranjang.index');

Route::get('/checkout','OrderController@checkout')->name('checkout.index');

Route::get('/profil','UserController@profile')->name('profile.index');
Route::post('/profil','UserController@updateProfile')->name('updateprofile.index');

Route::get('/riwayat','HistoryController@index')->name('history.index');
Route::get('/riwayat/{id}','HistoryController@detail')->name('historydetail.index');

Route::get('/home', 'HomeController@index')->name('home');
