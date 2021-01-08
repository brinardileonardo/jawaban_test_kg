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
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/artikel','ArtikelController@index');
Route::get('/artikel/add','ArtikelController@add_view');
Route::post('/artikel/save','ArtikelController@add_process');
Route::get('/artikel/edit/{id}','ArtikelController@edit_view');
Route::post('/artikel/update','ArtikelController@update_process');
Route::get('/artikel/hapus/{id}','ArtikelController@hapus_process');

Route::get('/category','CategoryController@index');
Route::get('/category/add','CategoryController@add_view');
Route::post('/category/save','CategoryController@save_process');
Route::get('/category/edit/{id}','CategoryController@edit_view');
Route::post('/category/update','CategoryController@update_process');
Route::get('/category/hapus/{id}','CategoryController@hapus_process');

Route::get('/status','StatusController@index');
Route::get('/report','ReportController@index');