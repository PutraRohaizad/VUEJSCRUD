<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/fetch', 'HomeController@fetch')->name('fetch');
Route::post('/add-product-list', 'HomeController@addProductList')->name('add-product-list');
Route::post('/delete-product-list/{id}', 'HomeController@deleteProductList')->name('delete-product-list');
Route::put('/update-product-list/{id}', 'HomeController@updateProductList')->name('update-product-list');



Route::post('/addcart', 'HomeController@addcart')->name('addcart');
Route::post('/checkout', 'HomeController@checkout')->name('checkout');