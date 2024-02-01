<x-list>
    @foreach ($this->commands as $command)
        <x-list.item :title="$command->title" :subtitle="$command->extension->title" :accessories="[['text' => $command->type]]">
            <x-action-panel>
                <x-action title="Open Command" action="enter" />
            </x-action-panel>
        </x-list.item>
    @endforeach
</x-list>
