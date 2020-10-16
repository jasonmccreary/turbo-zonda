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

Route::view('/', 'welcome');

Route::get('video', 'VideoController@index')->name('video.index');

Route::middleware('auth')->group(function () {
    Route::get('video/{video}', 'VideoController@show')->name('video.show');
    Route::resource('comment', 'CommentController')->only('create', 'show');
});

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('billing', 'BillingController@create')->name('billing.create');
    Route::post('billing', 'BillingController@store')->name('billing.store');

    Route::get('invoices', 'InvoiceController@index')->name('invoices.index');
    Route::get('invoices/{invoiceId}', 'InvoiceController@show')->name('invoices.show');
});

Route::resource('watch', 'WatchController')->only('store');
