<x-list :filtering="false">
    @foreach ($this->commands as $command)
        <x-list-item :title="$command->title" :subtitle="$command->extension->title" :accessories="[['text' => $command->type]]">
            <x-action-panel :shouldRender="isset($this->command->stacks['actionPanel']) ? false : null">
                <x-action title="Open Command" action="enter" index="0" />
            </x-action-panel>
            @if (!isset($this->selected) || $this->selected == self::$index)
                @foreach ($this->command->stacks as $stack => $component)
                    @push($stack) 
                        {{ $component }}
                    @endpush
                @endforeach
            @endif
        </x-list-item>
    @endforeach
</x-list>
