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


Route::get('profile', 'UserController@profile');
Route::get('users', 'UserController@users');
Route::get('getChannelUsers', 'UserController@getUsers');



Route::get('createUser', 'UserController@createUser');
Route::post('createUserAction', 'UserController@createUserAction');
Route::get('createUserAction', 'UserController@createUserAction');

Route::get('getUserChannels', 'ChannelController@getChannels');
Route::get('joinChannelAction', 'ChannelController@joinChannelAction');
Route::post('joinChannelAction', 'ChannelController@joinChannelAction');
Route::get('leftChannelAction', 'ChannelController@leftChannelAction');
Route::get('channels', 'ChannelController@channels');
Route::get('createChannelAction', 'ChannelController@createChannelAction');
Route::post('createChannelAction', 'ChannelController@createChannelAction');
Route::view('createChannel', 'createchannel');
Route::view('joinChannel', 'joinchannel');

Route::get('tags', 'TagController@channels');
Route::get('createTag', 'TagController@createTag');
Route::get('createTagAction', 'TagController@createTagAction');
Route::post('createTagAction', 'TagController@createTagAction');



Route::view('createUser', 'createuser');


//Route::group(['middleware' => 'auth'], function () {
//  Route::get('profile', 'UserController@profile');
//});
//
//Route::auth();

