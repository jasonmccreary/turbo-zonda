<?php

use App\Http\Controllers\Api\WatchController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\VideoController;
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

Route::get('video', [VideoController::class, 'index'])->name('video.index');

Route::middleware('auth')->group(function () {
    Route::get('video/{video}', [VideoController::class, 'show'])->name('video.show');
    Route::resource('comment', CommentController::class)->only('create', 'show');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('billing', [BillingController::class, 'create'])->name('billing.create');
    Route::post('billing', [BillingController::class, 'store'])->name('billing.store');

    Route::get('invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('invoices/{invoiceId}', [InvoiceController::class, 'show'])->name('invoices.show');
});

Route::resource('watch', WatchController::class)->only('store');
