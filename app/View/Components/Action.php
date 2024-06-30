<?php

namespace App\View\Components;

class Action extends \Illuminate\View\Component
{
    public function __construct(public $shortcut = false)
    {
        $this->shortcut = ActionPanel::$index == 0 && ! $this->shortcut ? 'enter' : $this->shortcut;
    }

    public function render()
    {
        return view('components.action', [
            'index' => ActionPanel::$index++, 
        ]);
    }
}
