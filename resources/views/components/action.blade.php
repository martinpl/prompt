@props([
    'title', 
    'action' => false, 
])
@php($action = $action ? $action . '; search.focus()' : false)

<x-dropdown-item {{ $attributes->merge([
    'id' => 'action-'.$index + 1, 
    'wire:click' => $action,
    '@keyup.'.$shortcut.'.window' => $shortcut ? '$el.click()' : false,
]) }} :$index>
    {{ $title }}
</x-dropdown-item>