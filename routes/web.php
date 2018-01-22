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

Route::get('/create/todo','TodoController@create');
Route::post('/create/todo','TodoController@store');
Route::get('/home','TodoController@index');
Route::get('/edit/todo/{id}','TodoController@edit');
Route::post('/edit/todo/{id}','TodoController@update');
Route::delete('/delete/todo/{id}','TodoController@destroy');