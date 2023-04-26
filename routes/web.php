<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('site.index');


Route::get('/login', 'HomeController@index');
// Posts

Route::group(['namespace' => 'Post'], function() {
    Route::get('/posts', "IndexController")->name('post.index');

    Route::get('/posts/create', "CreateController")->name('post.create')->middleware('post.create');
    Route::post('/posts', "StoreController")->name('post.store');

    Route::get('/posts/{post}/edit', "EditController")->name('post.edit');
    Route::patch('/posts/{post}', "UpdateController")->name('post.update');

    Route::delete('/posts/{post}', "DestroyController")->name('post.destroy');

    Route::get('/posts/firstOrCreate', "PostController@firstOrCreate");
    Route::get('/posts/updateOrCreate', "PostController@updateOrCreate");

    Route::get('/posts/{post}', "ShowController")->name('post.show');
});

// Route::get('/posts', "PostController@index")->name('post.index');
//
// Route::get('/posts/create', "PostController@create")->name('post.create');
// Route::post('/posts', "PostController@store")->name('post.store');
//
// Route::get('/posts/{post}/edit', "PostController@edit")->name('post.edit');
// Route::patch('/posts/{post}', "PostController@update")->name('post.update');
//
// Route::delete('/posts/{post}', "PostController@destroy")->name('post.destroy');
//
// Route::get('/posts/firstOrCreate', "PostController@firstOrCreate");
// Route::get('/posts/updateOrCreate', "PostController@updateOrCreate");
//
//Route::get('/posts/{post}', "PostController@show")->name('post.show');

// Categories

Route::get('/categories', 'CategoryController@index')->name('category.index');

Route::get('/categories/create', "CategoryController@create")->name('category.create');
Route::post('/categories', "CategoryController@store")->name('category.store');

Route::get('/categories/{category}/edit', "CategoryController@edit")->name('category.edit');
Route::patch('/categories/{category}', "CategoryController@update")->name('category.update');

Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('category.edit');

Route::delete('/categories/{category}', "CategoryController@destroy")->name('category.destroy');

Route::get('/categories/{category}', 'CategoryController@show')->name('category.show');

// Brands

Route::get('/brands', 'BrandController@index')->name('brand.index');

Route::get('/brands/create', 'BrandController@create')->name('brand.create');
Route::post('/brands', 'BrandController@store')->name('brand.store');

Route::get('/brands/{brand}/edit', 'BrandController@edit')->name('brand.edit');
Route::patch('/brands/{brand}', 'BrandController@update')->name('brand.update');

Route::delete('/brand/{brand}', 'BrandController@destroy')->name('brand.destroy');

Route::get('/brands/{brand}', 'BrandController@show')->name('brand.show');

// Admin

Route::group(['namespace' => 'Admin', 'prefix'=>'admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'IndexController')->name('admin.index');
    Route::group(['namespace' => 'Post'], function() {
        Route::get('/post', 'IndexController')->name('admin.post.index');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

