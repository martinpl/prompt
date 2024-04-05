<?php

namespace App\Providers;

use App\Extensions;
use App\Support\Macros\CollectionMacros;
use App\View\Directives;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        CollectionMacros::bootstrap();

        if (App::runningInConsole()) {
            return;
        }

        Extensions::bootstrap();
        Directives::bootstrap();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
