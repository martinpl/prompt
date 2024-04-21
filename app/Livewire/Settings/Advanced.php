<?php

namespace App\Livewire\Settings;

use App\Thing;

class Advanced extends \Livewire\Component
{
    public $options = [];

    public function mount()
    {
        $this->options = Thing::settings('advanced')->first();
    }

    public function updatedOptions()
    {
        Thing::settings('advanced')->save($this->options);
    }

    public function render()
    {
        return view('livewire.settings.advanced');
    }
}
