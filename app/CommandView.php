<?php

namespace App;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Blade;

class CommandView implements Htmlable
{
    public function __construct(public string $extension, public string $component, public array $data = [], public bool $livewire = true)
    {
    }

    public function toHtml()
    {
        if (! $this->livewire) {
            return view("{$this->extension}.{$this->component}", $this->data);
        }

        $variables = collect($this->data)->keys()->map(fn ($value) => ':$'.$value)->join(' ');
        $hash = hash('xxh3', serialize($this->data)); // hash allows to rerender same components with different data

        return Blade::render("<livewire:extensions.{$this->extension}.{$this->component} {$variables} :$hash />", $this->data);
    }
}
