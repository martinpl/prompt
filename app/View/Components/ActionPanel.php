<?php

namespace App\View\Components;

class ActionPanel extends \Illuminate\View\Component
{
    public function firstCommand($slot)
    {
        return str($slot)->before('</div>')->after('">');
    }

    public function render()
    {
        return view('components.action-panel');
    }
}
