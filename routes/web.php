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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/view/{id}', 'HomeController@view')->name('view');
Route::get('/account', 'AccountController@index')->name('account');
Route::get('/add', 'BulletinController@index')->name('add');
Route::post('/account', 'AccountController@update')->name('account');
Route::post('/add', 'BulletinController@create')->name('add');

Auth::routes();

