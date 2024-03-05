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
        '@click' => $this->selected == self::$index ? "document.querySelector(`#actions-1`).click()" : '$wire.$set(`selected`, `'.self::$index.'`)',
    ]) }}>
        {{ $slot }}
    </div>
    @php(self::$index++)
@endif