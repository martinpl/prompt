<?php

namespace App\View\Components\List;

class Item extends \Illuminate\View\Component
{
    public static $index = 0;

    public function render()
    {
        return function (array $data) {
            return view('components.list.item', [
                'index' => self::$index++,
                ...$data['attributes'],
                'slot' => $data['slot'],
            ]);
        };
    }
}
