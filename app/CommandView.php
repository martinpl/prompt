<?php

namespace App;

use Illuminate\Support\Facades\Blade;

class CommandView
{
    public function __construct(public string $extension, public string $component, public array $data = [], public bool $livewire = true)
    {
    }

    public function __toString()
    {
        if (! $this->livewire) {
            return view("{$this->extension}.{$this->component}", $this->data);
        }

        $variables = collect($this->data)->keys()->map(fn ($value) => ':$'.$value)->join(' ');

        return Blade::render("<livewire:extensions.{$this->extension}.{$this->component} {$variables} />", $this->data);
    }
}
