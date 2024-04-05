<?php

namespace App\View;

use Illuminate\View\ComponentAttributeBag;
use ImLiam\BladeHelper\Facades\BladeHelper;

class Directives
{
    public static function bootstrap()
    {
        self::Svg();
    }

    private static function Svg()
    {
        BladeHelper::directive('svg', function (string $path, $attributes = []) {
            $svg = file_get_contents(resource_path($path));
            $attributes = new ComponentAttributeBag($attributes);

            return str($svg)->replace('svg', 'svg '.$attributes->__toString());
        });
    }
}
