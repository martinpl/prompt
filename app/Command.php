<?php

namespace App;

use Closure;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

class Command
{
    public $name;

    public $type = 'Command';

    public $mode = 'view';

    public $route;

    public $execute;

    public $actions;

    public $options;

    public function __construct(public $title, public $extension, public $enabled)
    {
        $this->name = str($this->title)->slug->value;
    }

    public static function create($title, $extension, $enabled)
    {
        return new self($title, $extension, $enabled);
    }

    public function type($type)
    {
        $this->type = $type;

        return $this;
    }

    public function mode($mode)
    {
        $this->mode = $mode;

        return $this;
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

    public function execute(Closure $execute)
    {
        $this->execute = $execute;

        return $this;
    }

    public function actions(Closure $actions)
    {
        $this->actions = $actions;

        return $this;
    }

    public function options(Closure $options)
    {
        $this->options = $options;

        return $this;
    }
}
