<?php

namespace App\View\Components;

class Action extends \Illuminate\View\Component
{
    public function __construct(public $index, public $command = false, public $shortcut = false) 
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

    public function commandUrl($currentExtension)
    {
        if (!$this->command) {
            return;
        }

        if (!$currentExtension) {
            $currentExtension = str(url()->full())->after('extensions/')->before('/');
        }

        return '/extensions/'.$currentExtension.'/'.$this->command;
    }

    public function render()
    {
        return view('components.action');
    }
}
