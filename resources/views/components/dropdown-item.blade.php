@props(['index'])
@php($tag = $attributes->has('href') ? 'a' : 'div')

<{{ $tag }} {{ $attributes }} class="p-1 rounded-lg" :class="selected == {{ $index }} && 'bg-neutral-600 selected'" @click="show = false" data-id="item">
    {{ $slot }}
</{{ $tag }}>
