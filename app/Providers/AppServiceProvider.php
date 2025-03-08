<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    if ($this->app->environment('local')) {
      // Store email previews
      URL::forceScheme('http');

      \Illuminate\Support\Facades\Mail::alwaysTo('preview@example.com');

      // Store email previews in storage/framework/emails
      if (!file_exists(storage_path('framework/emails'))) {
        mkdir(storage_path('framework/emails'), 0777, true);
      }
    }
  }
}
