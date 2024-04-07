<?php

namespace App\Http\Controllers;

use Native\Laravel\Facades\Window;

class Thing
{
    public function __invoke($command)
    {
        $this->$command();
    }

    // https://github.com/NativePHP/laravel/pull/144
    // https://github.com/NativePHP/laravel/discussions/247
    private function toggle()
    {
        Window::open()
            ->title('Thing')
            ->width(750)
            ->height(480)
        // ->resizable(false)
            ->frameless(true)
            ->transparent(true)
            ->showDevTools(false);
    }

    private function settings()
    {
        Window::open('settings')
            ->route('settings')
            ->title('Preferences')
            ->width(900)
            ->height(540)
            ->frameless(true)
            ->transparent(true)
            ->showDevTools(false);

        Window::close();
    }

    private function quit()
    {
        Window::quit();
    }
}
