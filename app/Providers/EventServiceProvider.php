<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;

class EventServiceProvider extends \Illuminate\Foundation\Support\Providers\EventServiceProvider
{
    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Event::listen(fn (\App\Events\Prompt $event) => abort(redirect('/prompt/toggle')));
        Event::listen(fn (\App\Events\Settings $event) => abort(redirect('/prompt/settings')));
        Event::listen(fn (\Native\Laravel\Events\MenuBar\MenuBarShown $event) => abort(redirect('/prompt/toggle')));
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
