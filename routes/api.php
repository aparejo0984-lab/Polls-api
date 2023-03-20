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

Route::post('/register', ['as' => '', 'uses' => 'AuthController@createUser']);
Route::post('/login', ['as' => '', 'uses' => 'AuthController@loginUser']);

Route::apiResource('user', 'UserController');
Route::apiResource('category', 'CategoryController');
Route::apiResource('poll', 'PollController');
Route::apiResource('pollAnswer', 'PollAnswerController');
