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
})->where('any','.*');
Route::get('/', 'Client\ClientController@home');

Route::get('all', 'Contact\ContactController@home');
Route::resource('clients', 'Client\ClientController');
Route::resource('contacts', 'Contact\ContactController');
Route::get('contact', 'Client\ClientController@getClientContactsById');
