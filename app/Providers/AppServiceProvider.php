<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Correct spelling

use App\Http\View\Composer\MessageComposer;

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
    View::composer('*', MessageComposer::class);
  }
}