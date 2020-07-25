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



//post routs
Route::get('/posts','PostsController@index');
Route::get('/posts/user/{id}','PostsController@userIndex');
Route::post('/posts','PostsController@store');
Route::get('/posts/create','PostsController@create');
Route::get('/posts/{post}','PostsController@show');
Route::put('/posts/{post}','PostsController@update');
Route::delete('/posts/{post}','PostsController@destroy');
Route::get('/posts/{post}/edit','PostsController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
