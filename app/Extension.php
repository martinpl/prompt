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
        $enabled = (static::option('enabled') ?? true) && (self::option(command: str($title)->slug->value, key: 'enabled') ?? true);
        $command = Command::create($title, $this, $enabled);
        $this->commands[] = $command;

        return $command;
    }

    public static function meta($key)
    {
        $type = str(static::class)->classBasename()->value;

        return new Meta($type, $key);
    }

    public static function option($key, $command = null)
    {
        if ($command) {
            return Extensions::$settings[static::class]['commands'][$command][$key] ?? null;
        }

        if (! $command) {
            return Extensions::$settings[static::class][$key] ?? null;
        }
    }
}
