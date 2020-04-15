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



Route::get('/', 'PostController@index');


Route::get('post/', 'PostController@index')->name('post.index');
Route::get('post/create', 'PostController@create')->name('post.create');
Route::get('post/show/{id}', 'PostController@show')->name('post.show');
Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::post('post/', 'PostController@store')->name('post.store');
Route::patch('post/show/{id}', 'PostController@update')->name('post.update');
Route::delete('post/{id}', 'PostController@destroy')->name('post.destroy');


//Route::resource('/user', 'UserController');
Route::get('user/show/{id}', 'UserController@show')->name('user.show');
Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::post('user/', 'UserController@store')->name('user.store');
Route::patch('user/show/{id}', 'UserController@update')->name('user.update');
Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');


//Route::get('comment/create', 'CommentController')->name('post.create');
//Route::resource('/comment', 'CommentController');
Route::post('posts/{id}/comments', 'CommentController@store')->name('comment.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
