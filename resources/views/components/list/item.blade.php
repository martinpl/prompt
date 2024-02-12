
@props(['icon', 'title', 'subtitle' => '', 'accessories', 'index'])

<div {{ $attributes->class([
        'h-10 px-2 rounded-lg flex items-center justify-between',
        'bg-neutral-700' => $this->selected == $index, 
    ])->merge([
        'data-index' => $index,
        'wire:click' => "click($index)"
]) }}>
    <div class="flex gap-2">
        @isset ($icon)
            <img src="{{ $icon['source'] }}" class="w-6 h-6 mr-2">
        @endisset
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
</div>