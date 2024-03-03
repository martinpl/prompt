<?php

namespace App\View\Components;

class ActionPanel extends \Illuminate\View\Component
{
    public function firstCommand($slot)
    {
        return str($slot)->before('</')->after('">');
    }

    public function hasItems($slot)
    {
        return str($slot)->substrCount('data-id="item"') > 1;
    }

    public function render()
    {
        return view('components.action-panel');
    }
}
