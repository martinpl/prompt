<x-command {{ $attributes->merge([
    'x-data' => 'list', 
    '@keyup.up.window' => 'up', 
    '@keyup.down.window' => 'down',
]) }}>
    {{ $slot }}
</x-command>

@script
<script>
    Alpine.data('list', () => ({
        count() {
            return this.$root.childElementCount;
        },
        up() {
            if (this.count()) {
                $wire.selected = ($wire.selected - 1 + this.count()) % this.count();
                $wire.$refresh();
            }
        },
        down() {
            if (this.count()) {
                $wire.selected = ($wire.selected + 1) % this.count();
                $wire.$refresh();
            }
        }
    }))
</script>
@endscript