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

Route::get('video', ['uses' => 'VideoController@index', 'as' => 'video.index']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('video/{video}', ['uses' => 'VideoController@show', 'as' => 'video.show']);
    Route::resource('comment', 'CommentController', ['only' => ['create', 'show']]);
});


Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);


Route::group(['middleware' => ['auth']], function () {
  Route::get('billing', [
      'as' => 'billing.create',
      'uses' => 'BillingController@create',
  ]);
  Route::post('billing', [
      'as' => 'billing.store',
      'uses' => 'BillingController@store',
  ]);

  Route::get('invoices', [
      'as'   => 'invoices.index',
      'uses' => 'InvoiceController@index',
  ]);
  Route::get('invoices/{invoiceId}', [
      'as'   => 'invoices.show',
      'uses' => 'InvoiceController@show',
  ]);
});

Route::resource('watch', 'WatchController')->only('store');
