<?php

namespace App\Providers;

use Native\Laravel\Contracts\ProvidesPhpIni;
use Native\Laravel\Facades\GlobalShortcut;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        GlobalShortcut::key('CommandOrControl+Q')
            ->event(\App\Events\Prompt::class)
            ->register();

        MenuBar::create()
            // ->showDockIcon() // https://github.com/NativePHP/laravel/issues/211
            ->icon(resource_path('images/app.png'))
            ->withContextMenu(
                Menu::new()
                    ->event(\App\Events\Prompt::class, 'Open '.config('app.name'))
                    ->event(\App\Events\Settings::class, 'Preferences')
                    ->quit()
            )
            ->onlyShowContextMenu();
    }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [
        ];
    }
}
