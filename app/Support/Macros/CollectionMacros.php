<?php

namespace App\Support\Macros;

use Illuminate\Support\Collection;

class CollectionMacros
{
    public static function bootstrap()
    {
        self::index();
    }

    private static function index()
    {
        Collection::macro('index', fn ($index) => $this->slice($index, 1)->first());
    }
}
