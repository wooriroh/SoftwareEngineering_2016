<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/users', 'UsersController@index');
Route::get('/users/create', 'UsersController@create');
Route::get('/users/{user}', 'UsersController@display');
Route::post('/users', 'UsersController@store');
Route::get('/users/{user}/edit', 'UsersController@edit');
Route::delete('/users/{user}', 'UsersController@delete');
Route::post('/users/{user}', 'UsersController@update');


Route::get('/courses', 'CoursesController@index');
Route::get('/courses/create', 'CoursesController@create');
Route::get('/courses/{course}', 'CoursesController@display');
Route::post('/courses', 'CoursesController@store');
Route::get('/courses/{course}/edit', 'CoursesController@edit');
Route::delete('/courses/{course}', 'CoursesController@delete');
Route::post('/courses/{course}', 'CoursesController@update');

Route::get('/lectures', 'LecturesController@index');
Route::get('/lectures/create', 'LecturesController@create');
Route::get('/lectures/{lecture}', 'LecturesController@display');
Route::post('/lectures', 'LecturesController@store');
Route::get('/lectures/{lecture}/edit', 'LecturesController@edit');
Route::delete('/lectures/{lecture}', 'LecturesController@delete');
Route::post('/lectures/{lecture}', 'LecturesController@update');
