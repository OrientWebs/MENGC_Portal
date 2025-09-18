@props([
    'disabled' => false,
    'error' => false,
    'data' => [],
    'placeholder' => 'Please Select',
])

<div class="relative" x-data="{
    open: false,
    filter: '',
    list: {{ json_encode($data) }},
    selectedKey: @entangle($attributes->wire('model')),
    selectedLabel: '',

    init() {
        this.selectedLabel = this.list[this.selectedKey] ?? '';
    },

    toggle() {
        if (!{{ $disabled ? 'true' : 'false' }}) {
            this.open = !this.open;
            this.filter = '';
            this.$nextTick(() => this.$refs.searchInput?.focus());
        }
    },

    close() {
        this.open = false;
    },

    select(value, key) {
        this.selectedKey = key === null ? '' : String(key);
        this.selectedLabel = value;
        this.close();
    },

    isSelected(key) {
        return this.selectedKey === String(key);
    },

    filteredList() {
        if (!this.filter) return this.list;
        return Object.fromEntries(
            Object.entries(this.list).filter(([_, value]) =>
                value.toLowerCase().includes(this.filter.toLowerCase())
            )
        );
    }
}" @click.away="close()">

    <!-- Hidden input bound to Livewire -->
    <input type="hidden" x-model="selectedKey" {{ $attributes }}>

    <!-- Dropdown button -->
    <span class="inline-block w-full rounded-md shadow-sm" @click="toggle()">
        <div {!! $attributes->merge([
            'class' =>
                'block w-full p-2.5 rounded-lg border sm:text-sm cursor-pointer ' .
                ($error
                    ? 'border-red-500 focus:ring-red-500 focus:border-red-500'
                    : 'border-gray-300 focus:ring-primary-500 focus:border-primary-500') .
                ' bg-white text-black placeholder-gray-500 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400',
        ]) !!}>
            <span class="block truncate" x-text="selectedLabel ? selectedLabel : '{{ $placeholder }}'"></span>
            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 dark:text-gray-300" viewBox="0 0 20 20" fill="none"
                    stroke="currentColor">
                    <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
        </div>
    </span>

    <!-- Dropdown panel -->
    <div x-show="open" x-transition
        class="absolute z-10 w-full mt-1 rounded-md shadow-lg p-2 bg-white border border-gray-300 dark:bg-gray-700 dark:border-gray-600">

        <!-- Search input -->
        <x-input.primary-input type="search" class="py-2 px-2 mb-2" placeholder="Search" x-model="filter"
            x-ref="searchInput"></x-input.primary-input>

        <!-- Reset option -->
        <li @click="select('', null)" :class="{ 'bg-gray-200 dark:bg-gray-600': selectedKey === '' }"
            class="relative py-1 pl-3 pr-9 mb-1 select-none cursor-pointer rounded-md
                   hover:bg-gray-100 dark:hover:bg-gray-600 text-gray-500 dark:text-gray-400 italic">
            <span class="block truncate">— {{ $placeholder }} —</span>
        </li>

        <!-- Options (clean destructuring) -->
        <template x-for="[id, name] in Object.entries(filteredList())" :key="id">
            <li @click="select(name, id)" :class="{ 'bg-gray-200 dark:bg-gray-600': isSelected(id) }"
                class="relative py-1 pl-3 pr-9 mb-1 select-none cursor-pointer rounded-md
                       hover:bg-gray-100 dark:hover:bg-gray-600 text-black dark:text-white flex justify-between items-center">
                <span x-text="name" class="block font-normal truncate"></span>
                <span x-show="isSelected(id)" class="absolute inset-y-0 right-0 flex items-center pr-4 text-green-500">
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </li>
        </template>
    </div>
</div>
