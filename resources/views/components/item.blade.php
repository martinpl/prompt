@props([
    'filtering' => true,
    'title',
])

@if (!$filtering || $this->filtering($title))
    <div {{ $attributes->class([
        'rounded-lg',
        'bg-neutral-700' => $this->isSelected(),
    ])->merge([
        'data-index' => self::$index,
        '@click' => $this->isSelected() ? "document.querySelector(`#action-1`).click()" : '$wire.$set(`selected`, `'.self::$index.'`)',
    ]) }}>
        {{ $slot }}
    </div>
    @php(self::$index++)
@endif