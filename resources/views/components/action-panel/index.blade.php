@aware(['index'])

@if (!isset($this->selected) || $this->selected == $index)
    @teleport('#actions')
        <div class="flex gap-2">
            <div class="flex gap-2 hover:bg-neutral-600" wire:click="enter">
                {!! $firstCommand($slot) !!}
                <x-keycap>en</x-keycap>
            </div>
            <x-dropdown postion="right">
                <x-slot:head @keydown.meta.k.window="open">
                    Actions: <x-keycap>⌘</x-keycap> + <x-keycap>k</x-keycap>
                </x-slot:head>
                {{ $slot }}
            </x-dropdown>
        </div>
    @endteleport
@endif