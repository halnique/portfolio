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
Route::group(['namespace' => 'Api'], function () {
    Route::get('/profiles', 'ProfileController@index');
    Route::get('/profiles/{name}', 'ProfileController@show');
    Route::group(['middleware' => ['auth']], function () {
        Route::post('/profiles', 'ProfileController@store');
        Route::put('/profiles/{name}', 'ProfileController@update');
        Route::delete('/profiles/{name}', 'ProfileController@destroy');
    });
});
