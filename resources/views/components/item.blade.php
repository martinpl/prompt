@props([
    'filtering' => true, 
    'title'
])

@if (!$filtering || $this->filtering($title))
    <div {{ $attributes->class([
        'rounded-lg',
        'bg-neutral-700' => $this->selected == self::$index, 
    ])->merge([
        'data-index' => self::$index,
        'wire:click' => 'click('.self::$index.')'
    ]) }}>
        {{ $slot }}
    </div>
    @php(self::$index++)
@endif