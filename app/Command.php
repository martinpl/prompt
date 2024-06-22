<?php

namespace App;

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

class Command
{
    public $name;

    public $type = 'Command';

    public $mode = 'view';

    public $route;

    public $parameters;

    public $options;

    public $stacks = [];

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

    public function parameters($parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    public function invoke($handle)
    {
        $this->route = "extensions/{$this->extension->name}/{$this->name}/".$this->parameters;

        $isVolt = is_string($handle) && ! str_contains($handle, '\\');

        if (! $isVolt) {
            Route::get($this->route, $handle)->middleware('web');
        }

        if ($isVolt) {
            Volt::route($this->route, "{$this->extension->name}.{$handle}")->middleware('web');
        }
    }

    public function options($component, $data)
    {
        $this->options = new CommandView($this->extension->name, $component, $data);

        return $this;
    }

    public function addStack($stack, $component, $data, $livewire = true)
    {
        $this->stacks[$stack] = new CommandView($this->extension->name, $component, $data, $livewire);

        return $this;
    }
}
