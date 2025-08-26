@php
    $breadcrumbs = [
        'admin/dashboard' => [['name' => 'Dashboard', 'route' => 'admin.dashboard']],

        'profile/show' => [['name' => 'Dashboard', 'route' => 'admin.dashboard'], ['name' => 'Profile', 'route' => '']],

        'admin/users' => [
            ['name' => 'Dashboard', 'route' => 'admin.dashboard'],
            ['name' => 'User', 'route' => 'admin.users'],
        ],

        'admin/users/create' => [
            ['name' => 'Dashboard', 'route' => 'admin.dashboard'],
            ['name' => 'User', 'route' => 'admin.users'],
            ['name' => 'Create', 'route' => ''],
        ],

        'admin/roles' => [
            ['name' => 'Dashboard', 'route' => 'admin.dashboard'],
            ['name' => 'Role', 'route' => 'admin.roles'],
        ],

        'admin/roles/create' => [
            ['name' => 'Dashboard', 'route' => 'admin.dashboard'],
            ['name' => 'Role', 'route' => 'admin.roles'],
            ['name' => 'Create', 'route' => ''],
        ],
    ];

    // Get current URL path (without domain)
    $currentPath = request()->path(); // eg: "admin/users/create"
    $currentBreadcrumbs = $breadcrumbs[$currentPath] ?? [['name' => 'Dashboard', 'route' => '']];
@endphp

<nav class="flex mb-6" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        @foreach ($currentBreadcrumbs as $index => $breadcrumb)
            <li class="inline-flex items-center">
                @if ($index > 0)
                    <svg class="w-6 h-6 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                @endif

                @if ($breadcrumb['route'] && $index < count($currentBreadcrumbs) - 1)
                    <a href="{{ route($breadcrumb['route']) }}" wire:navigate
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white transition-colors duration-200">
                        @if ($index === 0)
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                        @endif
                        {{ $breadcrumb['name'] }}
                    </a>
                @else
                    <span class="inline-flex items-center text-sm font-medium text-gray-500 dark:text-gray-400">
                        @if ($index === 0)
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
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
