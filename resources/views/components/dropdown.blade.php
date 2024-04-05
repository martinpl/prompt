@props(['postion' => 'left'])

<div {{ $attributes }} class="relative" x-data="dropdown" @click.outside="show = false">
    <div class="flex items-center hover:bg-neutral-600 rounded-lg p-1" @click="open" {{ $head->attributes }}>
        {{ $head }}
    </div>
    <div class="absolute bottom-6 {{ $postion == 'left' ? 'left-0' : 'right-0' }} pointer-events-none opacity-0 grid gap-2 w-64 bg-neutral-700 rounded-lg p-2" 
        :class="show && 'pointer-events-auto opacity-100'" data-id="body">
        <div class="max-h-36 overflow-y-auto grid gap-1">
            {{ $slot }}
        </div>
        <x-text-input x-ref="search" type="text" 
            @keyup.enter.stop="enter"
            @keyup.escape.stop="escape"
            @keyup.down.stop="down" 
            @keyup.up.stop="up" />
    </div>
</div>

@script
<script>
    Alpine.data('dropdown', () => ({
        show: false,
        selected: 0,
        open() {
            this.show = true;
            this.$refs.search.focus()
        },
        count() {
            return this.$root.querySelectorAll('[data-id="body"] [data-id="item"]').length;
        },
        up() {
            this.selected = (this.selected - 1 + this.count()) % this.count()
        },
        down() {
            this.selected = (this.selected + 1) % this.count()
        },
        enter() {
            this.$root.querySelector('.selected').click()
        },
        escape() {
            this.show = false;
            document.querySelector('input').focus()
        },
        init() {
            this.$watch('selected', value => this.$root.querySelector(`[data-index="${value}"]`).scrollIntoView(false))
        }
    }))
</script>
@endscript