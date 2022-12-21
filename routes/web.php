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
//検索機能
Route::get('/product/search', 'ProductController@search')->name('search');
//削除
Route::post('product/delete/{id}', 'ProductController@delete')->name('delete');
//登録画面の表示
Route::get('/product/create', 'ProductController@showCreate')->name('create');
//商品登録
Route::post('/product/productStore', 'ProductController@productStore')->name('productStore');
//詳細表示
Route::get('/product/{id}', 'ProductController@showDetail')->name('detail');
//編集画面
Route::get('/product/edit/{id}', 'ProductController@showEdit')->name('edit');
Route::post('/product/update/{id}', 'ProductController@listUpdate')->name('listUpdate');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
