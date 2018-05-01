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
Route::get('/profile/edit', 'ProfileController@viewEditCurrentUserProfile')->name('view-edit-profile');
Route::post('/profile/edit', 'ProfileController@editCurrentUserProfile')->name('edit-profile');
Route::get('/idea/match', 'IdeaController@match')->name('idea.match');
Route::post('idea/match.', 'IdeaController@selectMatch')->name('idea.selectmatch');
Route::get('/pitch', 'PitchController@pitch');
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
