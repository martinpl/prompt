@props([
    'filtering', 
    'afterSearch' => ''
])

<x-command {{ $attributes->merge([
    'x-data' => 'list', 
    '@keyup.up.window' => 'up', 
    '@keyup.down.window' => 'down',
]) }} :$afterSearch>
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
                $wire.$set('selected', ($wire.selected - 1 + this.count()) % this.count())
            }
        },
        down() {
            if (this.count()) {
                $wire.$set('selected', ($wire.selected + 1) % this.count())
            }
        }
    }))
</script>
@endscript