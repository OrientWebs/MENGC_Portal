@props(['currentUrl' => '', 'sub' => []])

@php
    // Global Config
    $breadcrumbs = [
        'admin/users' => [
            ['name' => 'Dashboard', 'route' => 'admin.dashboard'],
            ['name' => 'Users', 'route' => 'admin.users'],
        ],
        'admin/roles' => [
            ['name' => 'Dashboard', 'route' => 'admin.dashboard'],
            ['name' => 'Roles', 'route' => 'admin.roles'],
        ],
        'admin/states' => [
            ['name' => 'Dashboard', 'route' => 'admin.dashboard'],
            ['name' => 'States', 'route' => 'admin.states'],
        ],
        'admin/townships' => [
            ['name' => 'Dashboard', 'route' => 'admin.townships'],
            ['name' => 'Townships', 'route' => 'admin.townships'],
        ],
    ];

    // Current page main breadcrumbs
    $items = $breadcrumbs[$currentUrl] ?? [];

    // Sub Breadcrumbs (create, edit etc.)
    if (!empty($sub)) {
        foreach ($sub as $name => $route) {
            $items[] = ['name' => ucfirst($name), 'route' => $route];
        }
    }
@endphp

<nav class="flex mb-6" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2">
        @foreach ($items as $index => $breadcrumb)
            <li class="inline-flex items-center">
                {{-- Arrow Icon --}}
                @if ($index > 0)
                    <svg class="w-4 h-4 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                @endif

                {{-- Link or Last Text --}}
                @if ($breadcrumb['route'] && $index < count($items) - 1)
                    <a href="{{ route($breadcrumb['route']) }}" wire:navigate
                        class="text-sm font-medium text-gray-600 hover:text-blue-600 transition-colors duration-200 flex items-center">
                        @if ($index === 0)
                            <svg class="w-4 h-4 mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                        @endif
                        {{ $breadcrumb['name'] }}
                    </a>
                @else
                    <span class="text-sm font-semibold text-gray-900 dark:text-gray-200 flex items-center">
                        @if ($index === 0)
                            <svg class="w-4 h-4 mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                        @endif
                        {{ $breadcrumb['name'] }}
                    </span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
