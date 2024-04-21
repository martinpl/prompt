<x-layouts.app>
    <div x-data="{ tab: 'extensions' }" class="h-screen bg-neutral-800 text-white rounded-xl overflow-hidden">
        <nav>
            <button @click="tab = 'extensions'">Extensions</button>
            <button @click="tab = 'advanced'">Advanced</button>
        </nav>
        <div x-show="tab == 'extensions'">
            <livewire:app.livewire.settings.extensions />
        </div>
        <div x-show="tab == 'advanced'" x-cloak>
            <livewire:app.livewire.settings.advanced />
        </div>
    </div>
</x-layouts.app>