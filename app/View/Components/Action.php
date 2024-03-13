<?php

namespace App\View\Components;

class Action extends \Illuminate\View\Component
{
    public function __construct(public $index, public $shortcut = false) 
    {
        $this->setShortcut();
    }

    private function setShortcut()
    {
        $shortcut = $this->index == 0 ? 'enter' : $this->shortcut;
        $shortcuts = [
            'remove' => 'delete',
        ];
        
        $this->shortcut = $shortcuts[$shortcut] ?? $shortcut;
    }

    public function render()
    {
        return view('components.action');
    }
}
