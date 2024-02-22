<?php

namespace App;

use Illuminate\Support\Collection;

abstract class Extension
{
    public $name;

    public $title;

    public Collection $commands;

    public function __construct()
    {
        $this->name = str($this->title)->slug->value;
        $this->commands = collect();
    }

    public function command($title)
    {
        $enabled = (self::setting('enabled') ?? true) && (self::commandSetting(str($title)->slug->value, 'enabled') ?? true);
        $command = Command::create($title, $this, $enabled);
        $this->commands[] = $command;

        return $command;
    }

    public static function meta($key)
    {
        $type = str(static::class)->classBasename()->value;

        return new Meta($type, $key);
    }

    public static function setting($key)
    {
        return Extensions::$settings[static::class][$key] ?? null;
    }

    public static function commandSetting($command, $key)
    {
        return Extensions::$settings[static::class]['commands'][$command][$key] ?? null;
    }
}
