@props(['title', 'action'])
@use('App\View\Components\List\Item')
@use('App\View\Components\Action')

@if ($this->selected == Item::$index)
    <div @if (Action::$index == 0) wire:keydown.window.enter="{{ $action }}" @endif>
        {{ $title }}
    </div>
    @php(Action::$index++)
@endif