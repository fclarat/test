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



Route::get('/', 'ItemController@index')->name('item');
Route::post('/item', 'ItemController@create')->name('createItem');
Route::put('/item', 'ItemController@update')->name('updateItem');
Route::delete('/item', 'ItemController@delete')->name('deleteItem');
Route::get('/newitem', function () { return view('newitem'); })->name('newitem');