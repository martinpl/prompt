<?php

namespace App\Http\Controllers;

use Native\Laravel\Facades\Window;
use Native\Laravel\Facades\Clipboard;

class ActionController
{
    public function __invoke($command)
    {
        $command = str($command)->studly()->value;
        $this->$command();
    }

    private function copyToClipboard()
    {
        Clipboard::text(request()->input('text'));
        Window::close('main');
    }
}
