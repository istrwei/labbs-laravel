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

Route::get('/', 'TopicController@showLatestTopics');
Route::get('/topics/create', 'TopicController@showCreateTopic');

Route::get('/topics/{topic}/view', 'TopicController@view');

Route::post('/topics', [
    'middleware' => 'auth',
    'uses' => 'TopicController@create'
]);

Route::post('/topics/{topic}/replies', [
    'middleware' => 'auth',
    'uses' => 'TopicController@createReply'
]);

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
