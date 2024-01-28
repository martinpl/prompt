
@props(['title', 'subtitle' => ''])

<div @class(['bg-neutral-700' => $this->selected == $index, 'h-10 flex items-center px-2 rounded-lg']) wire:click="click({{ $index }})">
    {{ $title }}
    @if ($subtitle)
        {{ $subtitle }}
    @endif
    {{ $slot }}
</div>