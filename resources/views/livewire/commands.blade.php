<x-list>
    @foreach ($this->commands as $command)
        <x-list.item :title="$command->title" :subtitle="$command->extension->title" :accessories="[['text' => $command->type]]" :index="$loop->index">
            <x-action-panel>
                @isset ($command->actions)
                    {{ ($command->actions)() }}
                @else
                    <x-action title="Open Command" action="enter" index="0" />
                @endisset
            </x-action-panel>
        </x-list.item>
    @endforeach
</x-list>
