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


Route::get('/channels', 'ChannelController@channels')->name('channels');

Route::get('/tags', 'TagController@channels')->name('tags');


Route::get('/users', 'UserController@index')->name('users');



//Route::get('/api/flights/{id}', function ($id) {
//    return App\Flight::findOrFail($id);
//});
