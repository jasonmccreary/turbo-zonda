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

Route::get('video', ['uses' => 'VideoController@index', 'name' => 'video.index']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('video/{video}', ['uses' => 'VideoController@show', 'name' => 'video.show']);
    Route::resource('comment', 'CommentController', ['only' => ['create', 'show']]);
});

Route::post('watch', ['uses' => 'WatchController@post']);
