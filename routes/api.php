<?php

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

Route::get('/profiles', 'Profile@index');
Route::get('/profiles/{name}', 'Profile@show');
Route::group(['middleware' => ['auth']], function () {
    Route::post('/profiles', 'Profile@store');
    Route::put('/profiles/{name}', 'Profile@update');
    Route::delete('/profiles/{name}', 'Profile@destroy');
});
