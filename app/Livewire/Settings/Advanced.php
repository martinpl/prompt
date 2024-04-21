<?php

namespace App\Livewire\Settings;

use App\Prompt;

class Advanced extends \Livewire\Component
{
    public $options = [];

    public function mount()
    {
        $this->options = Prompt::settings('advanced')->first();
    }

    public function updatedOptions()
    {
        Prompt::settings('advanced')->save($this->options);
    }

    public function render()
    {
        return view('livewire.settings.advanced');
    }
}
