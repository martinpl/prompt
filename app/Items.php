<?php

namespace App;

trait Items
{
    use Escape;

    public static $index = 0;

    public $query = '';

    public $selected = 0;

    public function updatedQueryItems()
    {
        $this->reset('selected');
    }

    public function updatedSelectedItems()
    {
        $this->js('document.querySelector(`[data-index="${$wire.selected}"]`).scrollIntoView(false)');
    }

    public function filtering($title)
    {
        return str_contains(strtolower($title), strtolower($this->query));
    }
}
