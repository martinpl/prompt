
@props(['title', 'subtitle' => ''])
@aware(['filtering']) 
@php($attributes = $attributes->class('aspect-square grid place-items-center'))

<x-item :$title :$filtering :$attributes>
    {{ $slot }}
    <div>
    {{ $title }}
        @if ($subtitle)
            {{ $subtitle }}
        @endif
    </div>
</x-item>