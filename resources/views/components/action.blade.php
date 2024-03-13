@props([
    'title', 
    'action' => false, 
])

<x-dropdown-item {{ $attributes->merge([
    'id' => 'action-'.$index + 1, 
    'wire:click' => $action,
    '@keyup.'.$shortcut.'.window' => $shortcut ? '$el.click()' : false,
]) }} :$index>
    {{ $title }}
</x-dropdown-item>