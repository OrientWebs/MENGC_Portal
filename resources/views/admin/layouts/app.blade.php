<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{
    isSidebarOpen: window.innerWidth > 900,
    darkMode: localStorage.getItem('darkMode') || 'system',
    updateSidebarState() {
        this.isSidebarOpen = window.innerWidth > 900;
    }
}" x-init="window.addEventListener('resize', updateSidebarState);
$watch('darkMode', value => localStorage.setItem('darkMode', value));"
    :class="{
        'dark': darkMode === 'dark' || (darkMode === 'system' && window.matchMedia('(prefers-color-scheme: dark)')
            .matches)
    }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300" x-data="{
    sidebarOpen: localStorage.getItem('sidebarOpen') !== 'false',
    sidebarHovered: false,
    loading: false,
    toggleSidebar() {
        this.sidebarOpen = !this.sidebarOpen;
        localStorage.setItem('sidebarOpen', this.sidebarOpen);
    },
    toggleDarkMode() {
        this.darkMode = !this.darkMode;
        localStorage.setItem('darkMode', this.darkMode);
    },
    showLoading() {
        this.loading = true;
    },
    hideLoading() {
        this.loading = false;
    }
}"
    x-init="document.addEventListener('livewire:navigating', () => showLoading());
    document.addEventListener('livewire:navigated', () => hideLoading());

    document.addEventListener('sidebar-hover', (e) => {
        sidebarHovered = e.detail.hovered;
    });">

    <div class="antialiased bg-gray-50 dark:bg-gray-900 min-h-screen">
        <!-- Navbar -->
        @include('admin.partials.navbar')
        <x-notifications />


        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <!-- Main Content with Loading Overlay -->
        <main class="relative p-4 "
            :class="sidebarOpen ? 'md:ml-64' : (sidebarHovered ? 'md:ml-64' : 'md:ml-0 lg:ml-14')">

            <!-- Loading Overlay - Only covers main content -->
            <div x-show="loading" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 z-50 flex items-center justify-center  dark:bg-gray-900 backdrop-blur-sm rounded-lg">
                <div class="flex flex-col items-center">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
                    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">Loading...</p>
                </div>
            </div>

            <div class="mx-auto mt-20 max-w-screen-2xl">
                <!-- Breadcrumbs -->
                {{-- @include('admin.partials.breadcrumbs') --}}

                <!-- Page Content -->
                {{ $slot ?? '' }}
                @yield('content')
            </div>
        </main>
    </div>

    @stack('modals')
    @livewireScripts

    <script>
        document.addEventListener('alpine:init', () => {

            document.addEventListener('livewire:navigated', () => {
                document.documentElement.classList.toggle('dark', localStorage.getItem('darkMode') ===
                    'dark' ||
                    (localStorage.getItem('darkMode') === 'system' && window.matchMedia(
                        '(prefers-color-scheme: dark)').matches));
            });
        });

        Livewire.on('navigate', (url) => {
            window.Livewire.navigate(url);
        });
    </script>
</body>

</html>
