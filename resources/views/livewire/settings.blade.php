<div x-data="settings" class="h-screen bg-neutral-800 text-white rounded-xl overflow-hidden flex">
    <nav>
        <button @click="tab = 'extensions'">Extensions</button>
    </nav>
    <main>
        <div x-show="tab == 'extensions'" x-cloak>
            <div class="grid grid-cols-6">
                <div></div>
                <div>Name</div>
                <div>Type</div>
                {{-- <div>Alias</div>
                <div>Hotkey</div> --}}
                <div>Enabled</div>
            </div>
            <div>
                @foreach ($this->extensions as $extension)
                    <div x-data="{ show: false }">
                        <div @class(['grid grid-cols-6', 'bg-neutral-700' => $selected == $extension::class]) wire:click="$set('selected', '{{ addslashes($extension::class) }}')">
                            <diV @click="show = !show">
                                <span x-show="show">&#9660;</span>
                                <span x-show="!show">&#5171;</span>
                            </div>
                            <div>{{ $extension->title }}</div>
                            <div>
                                Extension
                            </div>
                            {{-- <div>--</div>
                            <div>--</div> --}}
                            <div><input type="checkbox" wire:model.live="settings.{{ $extension::class }}.enabled"></div>
                        </div>
                        @isset ($extension->commands)
                            <div x-show="show">
                                @foreach ($extension->commands as $command)
                                    <div @class(['grid grid-cols-6', 'bg-neutral-700' => $selected == $extension::class.'.'.$command->name]) wire:click="$set('selected', '{{ addslashes($extension::class).'.'.$command->name }}')">
                                        <div></div>
                                        <div class="pl-4">{{ $command->title }}</div>
                                        <div>
                                            {{ $command->type }}
                                        </div>
                                        {{-- <div>
                                            <x-text-input wire:model.live="settings.{{ $extension::class }}.commands.{{ $command->name }}.alias" />
                                        </div> --}}
                                        {{-- <div>
                                            <x-text-input wire:model.live="settings.{{ $extension::class }}.commands.{{ $command->name }}.hotkey" @keydown="hotkey" />
                                        </div> --}}
                                        <div><input type="checkbox" wire:model.live="settings.{{ $extension::class }}.commands.{{ $command->name }}.enabled"></div>
                                    </div>
                                @endforeach
                            </div>
                        @endisset
                    </div>
                @endforeach
            </div>
        </div>
    </main>
    @isset ($this->aside)
        <aside>
            <livewire:dynamic-component :is="$this->aside" />
        </aside>
    @endisset
</div>

@script
<script>
    Alpine.data('settings', () => ({
        tab: 'extensions',
        hotkey(event) {
            if (['Backspace', 'Escape'].includes(event.key)) {
                this.$el.value = '';
                return;
            }

            if (event.key == 'Enter') {
                return;
            }

            if (this.$el.value) {
                this.$el.value += " + ";
            }

            if (event.key.length != 1 || event.ctrlKey == true || event.altKey == true) {
                this.$el.value += event.key;
            }
        },
    }))
</script>
@endscript