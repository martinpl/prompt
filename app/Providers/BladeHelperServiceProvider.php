<?php

namespace App\Providers;

use App\View\BladeHelper;

class BladeHelperServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->singleton('blade.helper', function () {
            return new BladeHelper($this->app->make('blade.compiler'));
        });
    }
}
