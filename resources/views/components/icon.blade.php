@if ($icon)
    @svg("icons/{$icon}.svg", [...$attributes->class(['h-5'])])
@endif