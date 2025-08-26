@props(['groupLabel' => null, 'route' => null, 'active' => false ,'icon' => null])

<ul class="space-y-1" x-data="{ openItems: [{{ $active }}] }">
    <!-- User Management -->
    <li x-data="{ open: openItems.includes({{ $active }}) }" class="relative">
        <button @click="open = !open" @mouseenter="hoveredItem = 'UserManagement'" @mouseleave="hoveredItem = null"
            class="flex items-center w-full py-3 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-all duration-200"
            :class="sidebarOpen || hoveredWhenClosed ? 'px-3' : 'justify-center'">
            <span
                class="text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                <i class="{{ $icon }}"></i>
            </span>
            <span class="transition-all duration-300"
                :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 ml-3' : 'opacity-0 w-0 overflow-hidden'">
                {{ $groupLabel }}
            </span>
            <svg class="w-4 h-4 ml-auto transition-transform duration-200" :class="open ? 'rotate-90' : ''"
                x-show="sidebarOpen || hoveredWhenClosed" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>

        <!-- Submenu -->
        <ul x-show="open && (sidebarOpen || hoveredWhenClosed)" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="ml-6 mt-1 space-y-1 border-l border-gray-200 dark:border-gray-700 pl-4">
            {{ $slot }}
        </ul>
    </li>
</ul>
