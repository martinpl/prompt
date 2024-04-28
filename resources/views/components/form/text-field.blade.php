@props(['name' => '', 'title', 'autofocus' => false, 'placeholder'])

<div>
    {{ $title }} <x-text-input type="text" wire:model.blur="{{ $name }}" :$autofocus :$placeholder />
    <div>@error($name) {{ $message }} @enderror</div>
</div>