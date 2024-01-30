@if ($this->selected == \App\View\Components\List\Item::$index)
    @teleport('#actions')
        <div class="flex gap-2" x-data="{ selected: 0 }" @keyup.meta.k.window="$refs.search.focus()">
            <div class="flex gap-2" wire:click="enter">
                <div class="*:hidden [&>:first-child]:block">
                    {{ $slot }}
                </div>
                <x-keycap>en</x-keycap>
            </div>
            Actions: <x-keycap>⌘</x-keycap> + <x-keycap>k</x-keycap>
            <div class="absolute bottom-6 right-2 opacity-0 focus-within:opacity-100">
                {{ $slot }}
                <input x-ref="search" type="search" @keydown.down.stop="console.log('down')" @keydown.up.stop="console.log('up')">
            </div>
        </div>
    @endteleport
@endif