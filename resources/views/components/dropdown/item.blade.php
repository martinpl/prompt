<div {{ $attributes }} class="p-1 rounded-lg" :class="selected == {{ $index }} && 'bg-neutral-600 selected'" @click="show = false">
    {{ $slot }}
</div>
