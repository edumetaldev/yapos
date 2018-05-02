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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('items', 'ItemController');
Route::resource('pos', 'PosController');
Route::resource('sales', 'SaleController');
Route::resource('customers', 'CustomerController');
Route::resource('suppliers', 'SupplierController');
Route::resource('receivings', 'ReceivingController');
Route::resource('por', 'PorController');
Route::get('items/{id}/copy','ItemController@copy');
Route::resource('stocks', 'StockController');
