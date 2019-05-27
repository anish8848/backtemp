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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as'=>'page.', 'prefix'=>'page' ], function(){
// Route::get('','PageController@index')->name('index');
Route::get('create','PageController@create')->name('create');
Route::post('','PageController@store')->name('store');
// Route::put('{slider}','PageController@update')->name('update');
// Route::get('{slider}/edit','PageController@edit')->name('edit');
// Route::delete('{slider}','PageController@delete')->name('destroy');
});
