@props([
    'searchModel' => 'search',
    'perPageModel' => 'prePage',
    'perPageChange' => 'changePage',
    'perPageOptions' => [10, 20, 50, 100],
])

<div class="flex flex-wrap gap-3 items-center justify-between p-4 bg-gray-100 dark:bg-gray-800 rounded-t-xl">
    <div class="flex flex-wrap gap-2 items-center">
        <x-input.primary-input wire:model.live.debounce.500ms="{{ $searchModel }}" type="search" placeholder="Search…"
            class="w-48 sm:w-64" />
        <x-select.dropdown wire:model.live="{{ $perPageModel }}" class="w-24">
            @foreach ($perPageOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </x-select.dropdown>
    </div>

    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open"
            class="inline-flex items-center px-4 py-2 dark:bg-gray-800  white:bg-gray-200 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-sm font-medium text-gray-700  dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
            <i class="fa-solid fa-filter mr-2"></i>
            Filters
            <i class="fa-solid fa-chevron-down ml-2 transform transition-transform duration-200"
                :class="{ 'rotate-180': open }"></i>
        </button>

        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute right-0 mt-2 w-80 bg-white dark:bg-gray-800 shadow-xl rounded-lg border border-gray-200 dark:border-gray-700 z-20">
            <div class="p-4">
                <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100 mb-3">Filter Options</h3>
                <div class="space-y-4">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
