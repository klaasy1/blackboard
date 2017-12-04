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

Route::get('/client/view/{id}', 'ClientController@view');

Route::get('/client/edit/{id}', 'ClientController@editClientForm');

Route::post('/client/update/{id}', 'ClientController@update');

Route::get('/client/delete/{id}', 'ClientController@delete');

Route::get('/client', 'ClientController@show');

Route::get('/client/create', 'ClientController@createClientForm');

Route::post('/client/store', 'ClientController@store');

Route::put('user/{id}', 'ClientController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
