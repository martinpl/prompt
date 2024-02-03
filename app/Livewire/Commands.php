<?php

namespace App\Livewire;

use Native\Laravel\Facades\Window;

class Commands extends \Livewire\Component
{
    use \App\Items;

    #[\Livewire\Attributes\Computed]
    public function commands()
    {
        return \App\Extensions::list()
            ->map(fn ($extension) => $extension->commands)
            ->flatten()
            ->filter(fn ($command) => str_contains(strtolower($command->title), strtolower($this->query)));
    }

    public function enter()
    {
        $command = $this->commands->index($this->selected);

        if ($command->action) {
            ($command->action)($this);
        }

        if ($command->route) {
            $this->redirect($command->route);
        }
    }

    public function escape()
    {
        if ($this->query == '') {
            Window::close('main'); // https://github.com/NativePHP/laravel/pull/144
        } else {
            $this->reset('query');
        }
    }

    public function render()
    {
        return view('livewire.commands');
    }
}
