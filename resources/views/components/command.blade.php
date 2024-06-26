@props([
    'searchBarPlaceholder' => 'Search...',
])

<div class="h-screen flex flex-col bg-neutral-800 text-white rounded-xl overflow-hidden" wire:keyup.escape.window="escape">
    <header class="flex py-3 px-4 border-b border-neutral-700" wire:loading.class="border-loading">
        @if ($this->__name != 'app.livewire.commands')
            <button class="mr-2" wire:click="escape">
                <x-keycap><-</x-keycap>
            </button>
        @endif
        @isset($this->query)
            <input type="text" id="search" x-ref="search" placeholder="{{ $searchBarPlaceholder }}" class="w-full text-xl focus:outline-0 bg-neutral-800" wire:model.live="query" autofocus>
        @endisset
        @stack('afterSearch')
    </header>
    <div {{ $attributes->merge(['class' => 'h-full overflow-x-auto m-2']) }}>
        {{ $slot }}
    </div>
    <footer class="w-full h-full max-h-12 flex items-center justify-between py-2 px-2 bg-zinc-800">
        <x-dropdown>
            <x-slot:head>
                <x-icon icon="alien" />
            </x-slot:head>
            <x-dropdown-item :href="route('prompt', 'settings')" index="0">Preferences</x-dropdown-item>
            <x-dropdown-item :href="route('prompt', 'quit')" index="1">Quit</x-dropdown-item>
        </x-dropdown>
        @stack('actionPanel')
    </footer>
</div>