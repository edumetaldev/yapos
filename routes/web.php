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
<<<<<<< HEAD
Route::resource('customers', 'CustomerController');
=======
>>>>>>> bcd6b436e0f2d22660df6ec4ec29ac789c85c477
