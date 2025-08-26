@props(['label' => null, 'route' => null, 'active' => false, 'icon' => null])

<li>
    <a href="{{ $route ? route($route) : '#' }}" wire:navigate
        class="flex items-center justify-between px-3 py-2 text-sm text-gray-700 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 {{ $active ? 'bg-secondary-50 dark:bg-secondary-900/20 text-secondary-700 dark:text-white-300 border-r-2 border-secondary-600' : '' }}">
        <span>{{ $label }}</span>
        {{-- <span
             class="px-2 py-1 text-xs font-medium text-secondary-600 bg-secondary-100 rounded-full dark:bg-secondary-900 dark:text-secondary-300">12</span> --}}
    </a>
</li>
