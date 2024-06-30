@props(['shouldRender' => !isset($this->selected) || $this->isSelected()])

@pushIf($shouldRender, 'actionPanel')
    <div class="flex gap-2">
        <div class="flex gap-2 hover:bg-neutral-600 rounded-lg p-1" wire:click="enter">
            {!! $firstCommand($slot) !!}
            <x-keycap>en</x-keycap>
        </div>
        <x-dropdown postion="right" :hidden="!$hasItems($slot)">
            <x-slot:head @keydown.meta.k.window.prevent="open">
                Actions: <x-keycap>⌘</x-keycap> + <x-keycap>k</x-keycap>
            </x-slot:head>
            {{ $slot }}
        </x-dropdown>
    </div>
@endpushIf