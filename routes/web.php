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
    return view('index');
});

//Route::get('/{name}', function () {
//    return view('profile');
//});

Route::get('/{any}', function () {
    return redirect('/');
})->where('any', '.+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
