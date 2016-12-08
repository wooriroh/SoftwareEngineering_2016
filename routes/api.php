<?php

use Illuminate\Http\Request;

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

Route::post('/authenticate', 'Api\MobileAuthenticationController@getAccessToken');

Route::get('/user', 'Api\UserController@index')->middleware('auth:api');
Route::get('/courses', 'Api\CoursesController@index')->middleware('auth:api');
Route::get('/courses/{course}/lectures', 'Api\LecturesController@index')->middleware('auth:api');
Route::get('/courses/{course}/lectures/{lecture}/notices', 'Api\LectureNoticesController@index')->middleware('auth:api');
Route::get('/lectures', 'Api\LectureUserController@index')->middleware('auth:api');
Route::get('/lectures/presence', 'Api\LectureUserController@presence')->middleware('auth:api');
Route::post('/lectures/checkin', 'Api\LectureUserController@checkin')->middleware('auth:api');
Route::post('/lectures/checkout', 'Api\LectureUserController@checkout')->middleware('auth:api');

