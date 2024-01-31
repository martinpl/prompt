@if ($this->selected == \App\View\Components\List\Item::$index)
    @teleport('#actions')
        <div class="flex gap-2">
            <div class="flex gap-2" wire:click="enter">
                <div class="*:hidden [&>:first-child]:block">
                    {{ $slot }}
                </div>
                <x-keycap>en</x-keycap>
            </div>
            <x-dropdown postion="right">
                <x-slot:head @keyup.meta.k.window="$refs.search.focus()">
                    Actions: <x-keycap>⌘</x-keycap> + <x-keycap>k</x-keycap>
                </x-slot:head>
                {{ $slot }}
            </x-dropdown>
        </div>
    @endteleport
@endif