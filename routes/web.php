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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::post('/tweet/create', 'TweetsController@store');
    Route::get('/profiles', 'ProfilesController@index');
    Route::get('/profiles/{user:username}', 'ProfilesController@show');
    Route::post('/profiles/{user:username}/toggle', 'ProfilesController@toggle');
    Route::get('/profiles/{user:username}/edit', 'ProfilesController@edit');
    Route::patch('/profiles/{user:username}/update', 'ProfilesController@update');
    Route::get('/test/{user:username}', 'ProfilesController@following');
    Route::post('/tweet/{tweet}/like', 'LikesController@store');
    Route::delete('/tweet/{tweet}/dislike', 'LikesController@destroy');

});
Route::get('/home', 'TweetsController@index')->name('home');

Route::get('/test', function () {
    return auth()->user()->timeline();
});
