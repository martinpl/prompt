<?php

namespace App;

class Extensions
{
    public static $extension = [];

    public static function list()
    {
        return collect(self::$extension);
    }

    public static function bootstrap()
    {
        self::autoloader();
        self::register();
    }

    private static function autoloader()
    {
        spl_autoload_register(function ($className) {
            if (str_contains($className, 'Extensions')) {
                $dirs = str($className)->beforeLast('\\')->explode('\\')->map(fn ($part) => str($part)->kebab())->implode('/');
                $fileName = str($className)->afterLast('\\').'.php';
                $path = $dirs.'/'.$fileName;
                include storage_path($path);
            }
        });
    }

    private static function register()
    {
        $extensionFiles = collect(glob(storage_path('/extensions/*/*.php'))) // TODO: Move dir to user space
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
            self::$extension[] = $extension;
        }
    }
}
