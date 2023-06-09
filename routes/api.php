<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['namespace' => 'API', 'middleware' => 'jwt.auth'], function() {
    Route::group(['namespace' => 'Post'], function() {
        Route::get('/posts', 'PostController@index')->name('api.post.index');
        Route::get('/posts/create', 'PostController@create')->name('api.post.create');
        Route::post('/posts', 'PostController@store')->name('api.post.store');
        Route::get('/posts/{post}', 'PostController@show')->name('api.post.show');
        Route::get('/posts/{post}/edit', 'PostController@edit')->name('api.post.edit');
        Route::patch('/posts/{post}', 'PostController@update')->name('api.post.update');
        Route::delete('/posts/{post}', 'PostController@dekete')->name('api.post.dekete');
    });
});
