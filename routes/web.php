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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('addProduct/{product}', 'HomeController@addProduct')->name('addProduct');
Route::get('updateQty/{product}/{qty}', 'HomeController@updateQty')->name('updateQty');
Route::get('removeItem/{product}', 'HomeController@removeItem')->name('removeItem');
Route::get('clearCart', 'HomeController@clearCart')->name('clearCart');
Route::post('pay', 'HomeController@pay')->name('pay');
Route::get('orders', 'OrderController@index')->name('orders.index');
