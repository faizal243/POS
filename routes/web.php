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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('mereks','MerekController');
Route::resource('distributors','DistributorController');
Route::resource('barangs','BarangController');
Route::delete('barangs/{id}/dlt', 'BarangController@destroy');
Route::resource('transaksis','TransaksiController');
Route::resource('detail_transaksis','DetailtransaksiController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/print', 'TransaksiController@print');
Route::get('/exportlaporan', 'TransaksiController@laporanexport')->name('exportlaporan');
Route::get('/baranglaporan', 'BarangController@barangexport')->name('baranglaporan');
Route::put('bayar/{id}', 'TransaksiController@bayar');

