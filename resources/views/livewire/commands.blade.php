<x-list :filtering="false">
    @isset ($this->command->afterSearch)
        <x-slot:after-search>
            {{ $this->command->afterSearch }}
        </x-slot:after-search>
    @endisset
    @foreach ($this->commands as $command)
        <x-list-item :title="$command->title" :subtitle="$command->extension->title" :accessories="[['text' => $command->type]]">
            <x-action-panel>
                @if ($command->actions)
                    {{ $command->actions }}
                @else
                    <x-action title="Open Command" action="enter" index="0" />
                @endif
            </x-action-panel>
        </x-list-item>
    @endforeach
</x-list>
