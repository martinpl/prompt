<?php

namespace App;

trait Items
{
    use Escape;

    public $query = '';

    public $selected = 0;

    public function updatedQuery()
    {
        $this->reset('selected');
    }

    public function click($key)
    {
        if ($this->selected == $key) {
            $this->enter();
        } else {
            $this->selected = $key;
        }
    }
}
