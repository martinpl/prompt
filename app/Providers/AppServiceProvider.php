<?php

namespace App\Providers;

use App\Thing;
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

        config(['app.debug' => Thing::settings('advanced')->first()['debugMode'] ?? false]);

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
