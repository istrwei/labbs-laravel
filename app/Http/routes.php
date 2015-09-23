<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'TopicsController@showLatestTopics');
Route::get('/topics', 'TopicsController@showLatestTopics');
Route::get('/tags', 'TagController@showAllTags');

Route::get('/topics/create', 'TopicController@showCreateTopic');
Route::get('/tags/create', 'TagController@showCreateTag');

Route::get('/topics/{topic}', 'TopicController@view');
Route::get('/tags/{tag}', 'TagController@showTag');

Route::post('/topics', [
    'middleware' => 'auth',
    'uses' => 'TopicController@create'
]);

Route::post('/tags', [
    'middleware' => 'auth',
    'uses' => 'TagController@create'
]);

Route::post('/topics/{topic}/replies', [
    'middleware' => 'auth',
    'uses' => 'TopicController@createReply'
]);

Route::get('/users', 'UsersController@showUsers');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
