<aside x-data="{ hoveredWhenClosed: false, hoveredItem: null, initialized: false }" x-init="initialized = true" x-cloak
    class="fixed top-0 left-0 z-40 h-screen pt-14 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700"
    :class="[
        initialized ? 'transition-all duration-300 ease-in-out' : '',
        // Small & tablet: hidden unless sidebarOpen is true
        (window.innerWidth < 1024) ? (sidebarOpen ? 'w-64 translate-x-0 block' : 'hidden') :
        // Desktop: normal collapsed/expanded behavior
        (sidebarOpen ? 'w-64 translate-x-0' : (hoveredWhenClosed ? 'w-64 translate-x-0' : 'w-16 translate-x-0'))
    ]"
    id="sidebar" @mouseenter="if (!sidebarOpen && window.innerWidth >= 1024) hoveredWhenClosed = true"
    @mouseleave="if (!sidebarOpen && window.innerWidth >= 1024) { hoveredWhenClosed = false; hoveredItem = null; }">

    <!-- Sidebar content -->
    <div class="flex flex-col h-full bg-white dark:bg-gray-800 relative">

        <!-- Sidebar Content -->
        <div class="flex-1 overflow-y-auto py-4 px-3">
            <div class="mb-6">
                <!-- Section title -->
                <div class="mb-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider transition-all duration-300"
                    :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 px-3' : 'opacity-0 w-0 overflow-hidden'">
                    Platform
                </div>

                <!-- Dashboard -->
                <x-sidebar.item label='Dashboard' active="{{ request()->routeIs('admin.dashboard') }}" />

                @can(['menu-user-management'])
                    <x-sidebar.sidebar-group groupLabel="UserManagement" icon="fa-solid fa-users" :active="request()->routeIs('admin.user') ||
                        request()->routeIs('admin.users') ||
                        request()->routeIs('admin.roles') ||
                        request()->routeIs('admin.permissions')">

                        @can('user-access')
                            <x-sidebar.sub-sidebar label="Users" route="admin.users"
                                active="{{ request()->routeIs('admin.users') }}" />
                        @endcan

                        @can('role-access')
                            <x-sidebar.sub-sidebar label="Roles" route="admin.roles"
                                active="{{ request()->routeIs('admin.roles') }}" />
                        @endcan
                    </x-sidebar.sidebar-group>
                @endcan

                @can(['menu-setup'])
                    <x-sidebar.sidebar-group groupLabel="SetUp" icon="fa-solid fa-bars" :active="request()->routeIs('admin.states') ||
                        request()->routeIs('admin.townships') ||
                        request()->routeIs('admin.qualifications') ||
                        request()->routeIs('admin.academics') ||
                        request()->routeIs('admin.disciplines') ||
                        request()->routeIs('admin.ministries') ||
                        request()->routeIs('admin.prerequistics') ||
                        request()->routeIs('admin.universities')">

                        @can('state-access')
                            <x-sidebar.sub-sidebar label="States" route="admin.states"
                                active="{{ request()->routeIs('admin.states') }}" />
                        @endcan
                        @can('township-access')
                            <x-sidebar.sub-sidebar label="Townships" route="admin.townships"
                                active="{{ request()->routeIs('admin.townships') }}" />
                        @endcan
                        @can('university-access')
                            <x-sidebar.sub-sidebar label="Universities" route="admin.universities"
                                active="{{ request()->routeIs('admin.universities') }}" />
                        @endcan
                        @can('academic-access')
                            <x-sidebar.sub-sidebar label="Academic Discipline" route="admin.academics"
                                active="{{ request()->routeIs('admin.academics') }}" />
                        @endcan
                        @can('qualification-access')
                            <x-sidebar.sub-sidebar label="Qualifications" route="admin.qualifications"
                                active="{{ request()->routeIs('admin.qualifications') }}" />
                        @endcan
                        @can('discipline-access')
                            <x-sidebar.sub-sidebar label="Engineering Discipline" route="admin.disciplines"
                                active="{{ request()->routeIs('admin.disciplines') }}" />
                        @endcan
                        @can('ministry-access')
                            <x-sidebar.sub-sidebar label="Ministries" route="admin.ministries"
                                active="{{ request()->routeIs('admin.ministries') }}" />
                        @endcan
                        @can('prerequistic-access')
                            <x-sidebar.sub-sidebar label="Prerequistic" route="admin.prerequistics"
                                active="{{ request()->routeIs('admin.prerequistics') }}" />
                        @endcan

                    </x-sidebar.sidebar-group>
                @endcan

                @can(['menu-setup'])
                    <x-sidebar.sidebar-group groupLabel="Registration Form" icon="fa-solid fa-file" :active="request()->routeIs('admin.states') ||
                        request()->routeIs('admin.townships') ||
                        request()->routeIs('admin.qualifications')">

                        @can('state-access')
                            <x-sidebar.sub-sidebar label="PE" route="admin.states"
                                active="{{ request()->routeIs('admin.states') }}" />
                        @endcan

                    </x-sidebar.sidebar-group>
                @endcan



                <!-- Example Item -->
                <ul>
                    <li class="relative">
                        <a href="#" @mouseenter="hoveredItem = 'messages'" @mouseleave="hoveredItem = null"
                            class="flex items-center py-2 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-all duration-200"
                            :class="sidebarOpen || hoveredWhenClosed ? 'px-3' : 'justify-center'">

                            <!-- Icon -->
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                    clip-rule="evenodd"></path>
                            </svg>

                            <!-- Label -->
                            <span class="transition-all duration-300"
                                :class="sidebarOpen || hoveredWhenClosed ? 'opacity-100 ml-3' :
                                    'opacity-0 w-0 overflow-hidden'">
                                Messages
                            </span>

                            <!-- Badge -->
                            <span
                                class="ml-auto px-2 py-1 text-xs font-medium text-white bg-red-500 rounded-full transition-all duration-300"
                                x-show="sidebarOpen || hoveredWhenClosed">
                                5
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center" :class="sidebarOpen || hoveredWhenClosed ? 'space-x-3' : 'justify-center'">
                <div class="w-8 h-8 bg-gray-300 rounded-lg flex items-center justify-center">
                    <span class="text-sm font-medium text-gray-700">Orie</span>
                </div>
                <div x-show="sidebarOpen || hoveredWhenClosed" x-transition class="flex-1 overflow-hidden">
                    <div class="text-sm font-semibold text-gray-900 dark:text-white">OrientWebs</div>
                    <div class="text-xs text-gray-500 dark:text-gray-400">copy right 2025</div>
                </div>
            </div>
        </div>
    </div>
</aside>
