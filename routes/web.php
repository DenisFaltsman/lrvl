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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {

    Route::post('createUserAction', 'UserController@createUserAction');
    Route::post('createChannelAction', 'ChannelController@createChannelAction');
    Route::post('joinChannelAction', 'ChannelController@joinChannelAction');
    Route::post('createTagAction', 'TagController@createTagAction');


    Route::get('leftChannelAction/{id}', 'ChannelController@leftChannelAction');
    Route::get('createTag', 'TagController@createTag');
    Route::get('createTagAction', 'TagController@createTagAction');

    Route::get('removeTagAction/{id}/{channel}', 'TagController@removeTagAction');


    Route::view('createUser', 'createuser');
    Route::view('createChannel', 'createchannel');
    Route::view('joinChannel', 'joinchannel');

    Route::get('channels', 'ChannelController@channels');
    Route::get('profile', 'UserController@profile');
    Route::get('users', 'UserController@users');
    Route::get('tags', 'TagController@tags');

    Route::get('getChannelInfo/{id}', 'UserController@getChannelInfo');
    Route::get('getUserInfo/{id}', 'ChannelController@getUserInfo');
    Route::get('getTagInfo/{id}', 'TagController@getTagInfo');
});
