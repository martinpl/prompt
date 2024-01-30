<?php

namespace App;

use Native\Laravel\Facades\Window;

class Thing
{
    // https://github.com/NativePHP/laravel/pull/144
    // https://github.com/NativePHP/laravel/discussions/247
    public static function toggle()
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
}
