<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class BladeHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'blade.helper';
    }
}
