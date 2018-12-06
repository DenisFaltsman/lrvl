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

Route::get('tags', 'TagController@channels');
Route::get('profile', 'UserController@profile');


Route::get('users', 'UserController@users');
Route::get('getUserChannels', 'UserController@getChannels');
Route::get('joinChannel', 'UserController@joinChannel');
Route::post('joinChannel', 'UserController@joinChannel');
Route::get('leftChannel', 'UserController@leftChannel');


Route::get('channels', 'ChannelController@channels');
Route::get('getChannelUsers', 'ChannelController@getUsers');
Route::get('createChannel', 'ChannelController@createChannel');
Route::post('createChannel', 'ChannelController@createChannel');
Route::view('newChannel', 'ChannelController@createChannel');
Route::view('joinChannel', 'ChannelController@joinChannel');



Route::get('createTag', 'TagController@createTag');
Route::get('createTagAction', 'TagController@createTagAction');
Route::post('createTagAction', 'TagController@createTagAction');
