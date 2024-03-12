@props(['afterSearch'])

<div class="h-screen flex flex-col bg-neutral-800 text-white rounded-xl overflow-hidden">
    <header class="flex py-3 px-4 border-b border-neutral-700" wire:keyup.escape.window="escape">
        @if ($this->__name != 'app.livewire.commands')
            <button class="mr-2" wire:click="escape">
                <x-keycap><-</x-keycap>
            </button>
        @endif
        @isset($this->query)
            <input type="text" id="search" placeholder="Search..." class="w-full text-xl focus:outline-0 bg-neutral-800" wire:model.live="query" autofocus>
        @endisset
        {{ $afterSearch ?? '' }}
    </header>
    <div {{ $attributes->merge(['class' => 'h-full overflow-x-auto m-2']) }}>
        {{ $slot }}
    </div>
    <footer class="w-full flex justify-between py-3 px-4 bg-zinc-800">
        <x-dropdown>
            <x-slot:head>
                head
            </x-slot:head>
            <x-dropdown-item :href="route('thing', 'settings')" index="0">Preferences</x-dropdown-item>
            <x-dropdown-item :href="route('thing', 'quit')" index="1">Quit</x-dropdown-item>
        </x-dropdown>
        <div id="actions" wire:ignore></div>
    </footer>
</div>