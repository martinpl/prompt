<?php

namespace App\Listeners;

use App\Thing;

class ToggleWindow
{
    public function handle(): void
    {
        Thing::toggle();
    }
}
