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

Route::get('/', 'PostsController@index');
//Route::get('/login', 'Auth\AuthController@getLogin');
//Route::post('/login', 'Auth\AuthController@postLogin');
//Route::get('/register', 'Auth\AuthController@getRegister');
//Route::post('/register', 'Auth\AuthController@postRegister');
//Route::get('/logout', 'Auth\AuthController@logout');
//Route::get('password/email', 'Auth\PasswordController@getEmail');
//Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::group(['prefix' => 'posts'], function(){

        Route::get('', ['as' => 'admin.posts.index', 'uses' => 'PostsAdminController@index']);
        Route::get('create', ['as' => 'admin.posts.create', 'uses' => 'PostsAdminController@create']);
        Route::post('store', ['as' => 'admin.posts.store', 'uses' => 'PostsAdminController@store']);
        Route::get('edit/{id}', ['as' => 'admin.posts.edit', 'uses' => 'PostsAdminController@edit']);
        Route::put('update/{id}', ['as' => 'admin.posts.update', 'uses' => 'PostsAdminController@update']);
        Route::get('delete/{id}', ['as' => 'admin.posts.delete', 'uses' => 'PostsAdminController@delete']);
    });
});