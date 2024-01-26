<?php

namespace App\Providers;

use App\Extensions;
use App\Support\Macros\CollectionMacros;

class AppServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        CollectionMacros::bootstrap();
        Extensions::bootstrap();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
