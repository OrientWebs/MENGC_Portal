<div x-data="{ show: @entangle($attributes->wire('model')) }" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-show="show"
    id="{{ $id }}" class="jetstream-modal fixed inset-0 flex items-center justify-center z-50"
    style="display: none;">

    <!-- Background overlay -->
    <div x-show="show" class="fixed inset-0 bg-black/40 dark:bg-black/60 transition-opacity"
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-on:click="show = false">
    </div>

    <!-- Modal content -->
    <div x-show="show"
        class="relative bg-white dark:bg-gray-800 dark:text-white overflow-hidden rounded-2xl shadow-2xl w-full max-w-xl mx-auto"
        x-trap.inert.noscroll="show" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90 translate-y-4"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-90 translate-y-4">

        {{ $slot }}
    </div>
</div>
