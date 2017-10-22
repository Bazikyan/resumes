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

Route::get('/', ['as'=>'home', 'uses'=>'UploadController@search']);
Route::post('/', 'UploadController@search');

Route::get('/upload', ['as'=>'store', 'uses'=>'UploadController@store']);
Route::post('/upload', 'UploadController@store');
