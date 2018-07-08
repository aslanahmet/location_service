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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function () {
    Route::get('all', 'UserController@index');
    Route::get('search/{searchType}/{value}', 'UserController@show');
    Route::get('friends/{id}', 'UserController@getUserFriends');
    Route::post('user', 'UserController@store');
//update user
    Route::put('user', 'UserController@store');
//Delete user
    Route::delete('user/{id}', 'UserController@destroy');
});