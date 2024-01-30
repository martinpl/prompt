<?php

namespace App;

trait Escape
{
    public function escape()
    {
        $this->redirectRoute('commands');
    }
}
