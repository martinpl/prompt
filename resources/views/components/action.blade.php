@props([
    'title', 
    'href' => false,
    'action' => false, 
])

<x-dropdown-item {{ $attributes->merge([
    'id' => 'action-'.$index + 1, 
    'wire:click' => $action,
    '@keyup.'.$shortcut.'.window' => $shortcut ? '$el.click()' : false,
    'href' => $command ? $commandUrl($currentExtension ?? false) : $href,
]) }} :$index>
    {{ $title }}
</x-dropdown-item>