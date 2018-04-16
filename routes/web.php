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


Route::resource('ideas', 'IdeaController');


Route::resource('categories', 'CategoryController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category', 'CategoryController@index');
Route::get('/category/create', 'CategoryController@create')->name('category.create');
Route::get('/profile', 'ProfileController@viewCurrentUserProfile')->name('profile');
Route::post('/profile', 'ProfileController@editCurrentUserProfile')->name('edit-profile');