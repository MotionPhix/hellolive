<?php

use Illuminate\Support\Facades\Route;

Route::get(
  '/',
  [\App\Http\Controllers\BillboardController::class, 'home']
)->name('home');

Route::prefix('billboards')->name('billboards.')->group(function () {

  Route::get(
    '/',
    [\App\Http\Controllers\BillboardController::class, 'index']
  )->name('index');

  Route::get(
    '/s/{billboard}',
    [\App\Http\Controllers\BillboardController::class, 'show']
  )->name('show');

});

Route::get(
  '/company',
  [\App\Http\Controllers\AboutController::class, 'index']
)->name('about');

Route::prefix('contact')->name('contact.')->group(function () {

  Route::get(
    '/',
    [\App\Http\Controllers\ContactController::class, 'index']
  )->name('index');

  Route::post(
    '/contact',
    [\App\Http\Controllers\ContactController::class, 'submit']
  )->name('submit');

});

// Newsletter Routes
Route::prefix('newsletter')->name('newsletter.')->group(function () {

  Route::post(
    '/subscribe',
    [\App\Http\Controllers\NewsletterController::class, 'subscribe']
  )->name('subscribe');

  Route::get(
    '/unsubscribe/{token}',
    [\App\Http\Controllers\NewsletterController::class, 'unsubscribe']
  )->name('unsubscribe');

});
