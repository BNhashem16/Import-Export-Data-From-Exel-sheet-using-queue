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

#Import Route
Route::get('import', 'ExelController@index');
Route::post('import/file', 'ExelController@import')->name('import');
#Export Route
Route::get('export', 'ExelController@export')->name('export');
