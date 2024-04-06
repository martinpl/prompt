
@props([
    'icon' => false, 
    'title', 
    'subtitle' => '', 
    'accessories',
])
@aware(['filtering'])
@php($attributes = $attributes->class('h-10 px-2 flex items-center justify-between'))

<x-item :$title :$filtering :$attributes>
    <div class="flex items-center gap-2">
        <x-icon :$icon />
        {{ $title }}
        @if ($subtitle)
            <div class="text-neutral-400">
                {{ $subtitle }}
            </div>
        @endif
    </div>
    <div>
        @isset($accessories)
            @foreach ($accessories as $accessory)
                <div class="text-neutral-400">
                    {{ $accessory['text'] }}
                </div>
            @endforeach
        @endisset
    </div>
    {{ $slot }}
</x-item>