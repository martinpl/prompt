@props(['title', 'action' => false, 'index'])

@php
    if ($index == 0) {
        $attributes = $attributes->merge(['@keyup.enter.window' => '$el.click()']);
    }
@endphp

<x-dropdown-item {{ $attributes->merge(['wire:click' => $action]) }} :$index>
    {{ $title }}
</x-dropdown-item>