<?php

namespace App\View\Components\Action;

use App\View\Components\Action;

class Command extends Action
{
    public function __construct(public $target, public $shortcut = false) 
    {
    }

    public function commandUrl($currentExtension)
    {
        if (!$this->target) {
            return;
        }

        if (!$currentExtension) {
            $currentExtension = str(url()->full())->after('extensions/')->before('/');
        }

        return '/extensions/'.$currentExtension.'/'.$this->target;
    }

    public function render()
    {
        return view('components.action.command');
    }
}
