<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

  Route::get('/', \App\Livewire\Dashboard\Index::class)->name('dashboard');

  Route::get('/contacts', \App\Livewire\Contacts\Index::class)->name('contacts.index');

  Route::get('/projects', \App\Livewire\Projects\Index::class)->name('projects.index');

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
  ->name('logout');

  Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');
});

Route::group(['middleware' => 'guest'], function () {

  Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');

  Route::get('/register', \App\Livewire\Auth\Register::class)->name('register');

});
