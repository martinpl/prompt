@props([
    'title', 
    'action' => false, 
    'index'
])

<x-dropdown-item {{ $attributes->merge([
    'id' => 'action-'.$index + 1, 
    'wire:click' => $action,
    '@keyup.enter.window' => $index == 0 ? '$el.click()' : false,
]) }} :$index>
    {{ $title }}
</x-dropdown-item>