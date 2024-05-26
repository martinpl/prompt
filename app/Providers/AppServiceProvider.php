<?php

namespace App\Providers;

use App\Extensions;
use App\Prompt;
use App\Support\Macros\CollectionMacros;
use App\View\Directives;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        CollectionMacros::bootstrap();

        if (App::runningInConsole()) {
            return;
        }

        config(['app.debug' => Prompt::settings('advanced')->first()['debugMode'] ?? false]);

        Extensions::bootstrap();
        Directives::bootstrap();
    }

    public function boot(): void
    {
        $this->registerEventListeners();
    }

    public function registerEventListeners()
    {
        Event::listen(fn (\App\Events\Prompt $event) => abort(redirect('/prompt/toggle')));
        Event::listen(fn (\App\Events\Settings $event) => abort(redirect('/prompt/settings')));
        Event::listen(fn (\Native\Laravel\Events\MenuBar\MenuBarShown $event) => abort(redirect('/prompt/toggle')));
    }
}
