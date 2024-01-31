
@props(['title', 'subtitle' => ''])

<div {{ $attributes->class([
        'h-10 flex items-center px-2 rounded-lg',
        'bg-neutral-700' => $this->selected == $index, 
    ])->merge([
        'data-index' => $index,
        'wire:click' => "click($index)"
]) }}>
    {{ $title }}
    @if ($subtitle)
        {{ $subtitle }}
    @endif
    {{ $slot }}
</div>