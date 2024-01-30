<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;

class EventServiceProvider extends \Illuminate\Foundation\Support\Providers\EventServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        \App\Events\WindowShortcut::class => [
            \App\Listeners\ToggleWindow::class,
        ],
        \Native\Laravel\Events\MenuBar\MenuBarShown::class => [
            \App\Listeners\ToggleWindow::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
