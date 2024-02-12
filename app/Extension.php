<?php

namespace App;

abstract class Extension
{
    public $name;

    public $title;

    public $commands = [];

    public function __construct()
    {
        $this->name = str($this->title)->slug->value;
    }

    public function command($title)
    {
        $command = Command::create($title, $this);
        $this->commands[] = $command;

        return $command;
    }

    public static function meta($key)
    {
        $type = str(static::class)->classBasename()->value;

        return new Meta($type, $key);
    }
}
