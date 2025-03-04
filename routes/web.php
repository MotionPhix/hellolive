<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('pages.home');
})->name('home');

Route::get('/billboards', function () {
  return view('pages.billboards');
})->name('billboards');

Route::get('/about', function () {
  return view('pages.about');
})->name('about');

Route::get('/contact', function () {
  return view('pages.contact');
})->name('contact');
