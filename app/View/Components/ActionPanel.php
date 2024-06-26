<?php

namespace App\View\Components;

class ActionPanel extends \Illuminate\View\Component
{
    public static $index;

    public function __construct()
    {
        self::$index = 0;
    }

    public function firstCommand($slot)
    {
        return str($slot)->before('</div>')->after('<div>');
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
