<?php

namespace App\Livewire;

use Illuminate\Support\Facades;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Session;
use Native\Laravel\Facades\Window;

class Commands extends \Livewire\Component
{
    use \App\Items;

    #[Session]
    public $selected = 0;

    #[Computed]
    public function commands()
    {
        return \App\Extensions::list()
            ->map(fn ($extension) => $extension->commands)
            ->flatten()
            ->filter(fn ($command) => $command->mode == 'view' && $command->enabled)
            ->filter(fn ($command) => $this->filtering($command->title));
    }

    #[Computed]
    public function command()
    {
        $command = $this->commands->index($this->selected);
        Facades\View::composer('components.action.command', fn (View $view) => $view->with('currentExtension', $command->extension->name));

        return $command;
    }

    public function enter()
    {
        $this->redirect($this->command->route);
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
