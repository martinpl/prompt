@props([
    'index',
    'icon' => false,
])
@php($tag = $attributes->has('href') ? 'a' : 'div')

<{{ $tag }} {{ $attributes }} class="p-1 rounded-lg flex items-center gap-2" :class="selected == {{ $index }} && 'bg-neutral-600 selected'" @click="show = false" data-id="item" data-index="{{ $index }}">
    <x-icon :$icon />
    <div>
        {{ $slot }}
    </div>
</{{ $tag }}>