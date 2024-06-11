<?php

namespace App;

class Extensions
{
    public static $list = [];

    public static $settings = [];

    public static function list()
    {
        return collect(self::$list);
    }

    public static function bootstrap()
    {
        self::autoloader();
        self::settings();
        self::register();
    }

    private static function autoloader()
    {
        spl_autoload_register(function ($className) {
            if (str_starts_with($className, 'Extensions\\')) {
                $dirs = str($className)->after('Extensions\\')->beforeLast('\\')->explode('\\')->map(fn ($part) => str($part)->kebab())->implode('/');
                $fileName = str($className)->afterLast('\\').'.php';
                $path = $dirs.'/'.$fileName;
                include config('prompt.extensions_path').'/'.$path;
            }
        });
    }

    private static function register()
    {
        $extensionFiles = collect(glob(config('prompt.extensions_path').'/*/*.php'))
            ->reject(function ($path) {
                $filename = basename($path, '.php');
                $dirName = str($path)->explode('/')->index(-2);
                $className = str($dirName)->studly()->value;

                return $filename != $className;
            })
            ->all();

        foreach ($extensionFiles as $extensionPath) {
            $namespace = 'Extensions\\'.str(str($extensionPath)->explode('/')->index(-2))->studly();
            $class = $namespace.'\\'.basename($extensionPath, '.php');
            $extension = new $class;
            $extension->register();
            self::$list[] = $extension;
        }
    }

    private static function settings()
    {
        self::$settings = Prompt::settings('extensions')->first();
    }
}
