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


Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/profile','UserController@profile')->middleware('auth');
Route::post('/profile','UserController@accountUpdate')->middleware('auth');



Route::get('/users','UserController@users')->middleware('auth', 'admin');
Route::post('/user/change-role','UserController@changeRole')->middleware('auth', 'admin');
Route::post('/user/change-ban','UserController@changeBan')->middleware('auth', 'admin');