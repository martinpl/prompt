@props([
    'columns' => 5,
    'filtering', 
    'afterSearch' => ''
])

<x-command {{ $attributes->merge([
    'class' => 'grid grid-cols-'.$columns.' content-start gap-2',
    'x-data' => 'grid',
    '@keyup.up.window' => 'up', 
    '@keyup.down.window' => 'down',
    '@keyup.right.window' => 'right', 
    '@keyup.left.window' => 'left',
]) }} :$afterSearch>
    {{ $slot }}
</x-command>

@script
<script>
    Alpine.data('grid', () => ({
        count() {
            return this.$root.childElementCount;
        },
        up() {
            if (this.count()) {
                $wire.$set('selected', ($wire.selected - {{ $columns }} + this.count()) % this.count())
            }
        },
        down() {
            if (this.count()) {
                $wire.$set('selected', ($wire.selected + {{ $columns }}) % this.count())
            }
        },
        right() {
            if (this.count()) {
                $wire.$set('selected', ($wire.selected + 1 + this.count()) % this.count())
            }
        },
        left() {
            if (this.count()) {
                $wire.$set('selected', ($wire.selected - 1 + this.count()) % this.count())
            }
        }
    }))
</script>
@endscript