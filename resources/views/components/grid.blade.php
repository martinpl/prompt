@props([
    'columns' => 5,
    'filtering', 
    'columnClass' => match ($columns) {
        4 => 'grid-cols-4',
        5 => 'grid-cols-5',
        6 => 'grid-cols-6',
        7 => 'grid-cols-7',
        8 => 'grid-cols-8',
    }
])

<x-command {{ $attributes->merge([
    'class' => 'grid '.$columnClass.' content-start gap-2',
    'x-data' => 'grid',
    '@keyup.up.window' => 'up', 
    '@keyup.down.window' => 'down',
    '@keyup.right.window' => 'right', 
    '@keyup.left.window' => 'left',
]) }}>
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