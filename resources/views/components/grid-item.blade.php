
@props(['title', 'subtitle' => ''])
@php($attributes = $attributes->class('aspect-square grid place-items-center'))

<x-item :$title :$attributes>
    {{ $slot }}
    <div>
    {{ $title }}
        @if ($subtitle)
            {{ $subtitle }}
        @endif
    </div>
</x-item>