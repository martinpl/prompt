<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Action extends Component
{
    public static $index = 0;

    public function render()
    {
        return view('components.action.index');
    }
}
