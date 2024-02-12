
@props(['title', 'subtitle' => '', 'index'])

<div {{ $attributes->class(['bg-slate-500' => $this->selected == $index, 'rounded-lg grid place-items-center']) }} wire:click="click({{ $index }})">
    {{ $title }}
    @if ($subtitle)
        {{ $subtitle }}
    @endif
    {{ $slot }}
</div>