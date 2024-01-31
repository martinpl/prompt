@props(['postion' => 'left'])

<div class="relative" x-data="{ selected: 0 }">
    <div class="flex" @click="$refs.search.focus()" {{ $head->attributes }}>
        {{ $head }}
    </div>
    <div class="absolute bottom-6 {{ $postion }}-0 pointer-events-none opacity-0 focus-within:opacity-100 focus-within:pointer-events-auto">
        {{ $slot }}
        <input x-ref="search" type="text" @keydown.down.stop="console.log('down')" @keydown.up.stop="console.log('up')">
    </div>
</div>