
@props(['icon', 'title', 'subtitle' => '', 'accessories'])

<div {{ $attributes->class([
        'h-10 px-2 rounded-lg flex items-center justify-between',
        'bg-neutral-700' => $this->selected == $index, 
    ])->merge([
        'data-index' => $index,
        'wire:click' => "click($index)"
]) }}>
    <div class="flex">
        @isset ($icon)
            <img src="{{ $icon['source'] }}" class="w-6 h-6 mr-2">
        @endisset
        {{ $title }}
        @if ($subtitle)
            {{ $subtitle }}
        @endif
    </div>
    <div>
        @isset($accessories)
            @foreach ($accessories as $accessory)
                {{ $accessory['text'] }}
            @endforeach
        @endisset
    </div>
    {{ $slot }}
</div>