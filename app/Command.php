<?php

namespace App;

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

class Command
{
    public $name;

    public $type = 'Command';

    public $route;

    public $action;

    public static function create($title, $extension)
    {
        return new self($title, $extension);
    }

    public function __construct(public $title, public $extension)
    {
        $this->name = str($this->title)->slug->value;
    }

    public function livewire($component)
    {
        $this->route = "extensions/{$this->extension->name}/{$this->name}";

        if (str_contains($component, '\\')) {
            Route::get($this->route, $component)->middleware('web');
        } else {
            Volt::route($this->route, "{$this->extension->name}.{$component}")->middleware('web');
        }

        return $this;
    }

    public function type($type)
    {
        $this->type = $type;

        return $this;
    }

    public function action($action)
    {
        $this->action = $action;

        return $this;
    }
}
