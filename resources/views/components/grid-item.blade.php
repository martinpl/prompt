
@props(['title', 'subtitle' => ''])
@php($attributes = $attributes->class('aspect-square grid place-items-center'))

<x-item :$title :$attributes>
    {{ $title }}
    @if ($subtitle)
        {{ $subtitle }}
    @endif
    {{ $slot }}
</x-item>