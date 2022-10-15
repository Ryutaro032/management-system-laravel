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
//一覧表示
Route::get('/product', 'ProductController@showList')->name('list');
//詳細表示
Route::get('/product/{id}', 'ProductController@showDetail')->name('detail');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
