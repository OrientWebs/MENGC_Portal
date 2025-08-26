@props(['label' => null, 'route' => null, 'active' => false])
<!-- Dashboard -->
<ul class="pb-2">
    <li class="relative">
    <a href="{{ route('admin.dashboard') }}" @mouseenter="hoveredItem = 'dashboard'" @mouseleave="hoveredItem = null" wire:navigate
        class="flex items-center py-3 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-all duration-200 {{ $active ? 'bg-secondary-50 dark:bg-secondary-900/20 text-secondary-700 dark:text-secondary-300 border-r-2 border-secondary-600' : '' }}"
        :class="sidebarOpen || hoveredWhenClosed ? 'px-3' : 'justify-center'">
        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ $active  ? 'text-secondary-600 dark:text-secondary-400' : '' }}"
            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
            </path>
        </svg>
        <span class="transition-all duration-300"
            :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 ml-3' : 'opacity-0 w-0 overflow-hidden'">
            {{ $label }}
        </span>
    </a>
</li>
</ul>
