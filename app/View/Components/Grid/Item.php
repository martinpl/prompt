<?php

namespace App\View\Components\Grid;

class Item extends \Illuminate\View\Component
{
    private static $index = 0;

    public function render()
    {
        return function (array $data) {
            return view('components.grid.item', [
                'index' => self::$index++,
                ...$data['attributes'],
                'slot' => $data['slot'],
            ]);
        };
    }
}
