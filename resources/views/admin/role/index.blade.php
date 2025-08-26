<div>
    @can('role-create')
        <div class="flex justify-between items-center mb-6">
            <x-breadcrumbs currentUrl="admin/roles" />
            <div class="flex justify-end mb-3">
                <x-button.secondary-button type="button" wire:navigate
                    href="{{ route('admin.roles', ['action' => 'create']) }}">
                    <i class="fa-solid fa-user-plus mr-2"></i>Create</x-button.secondary-button>
            </div>
        </div>
    @endcan

    <x-datatable.table>
        {{-- Table Body --}}
        <x-slot name="tableBody">
            <x-datatable.body>
                <x-slot name="header">
                    <tr class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-900 dark:text-gray-400">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Active</th>
                        <th scope="col" class="px-6 py-3">Create Date</th>
                        <th scope="col" class="px-6 py-3">Update Date</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </x-slot>

                <x-slot name="body">
                    @forelse($roles as $index => $record)
                        <tr
                            class="bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $record->name ?? '-' }}</td>
                            <td class="px-6 py-4">

                                @can('role-edit')
                                    <div class="flex items-center gap-2">
                                        {{-- Toggle --}}
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" wire:click="toggleActive({{ $record->id }})"
                                                @checked($record->is_active) class="sr-only peer">
                                            <div
                                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-green-500
                                                after:content-[''] after:absolute after:w-5 after:h-5 after:top-0.5 after:left-[2px]
                                                after:bg-white  after:rounded-full after:transition-all peer-checked:after:translate-x-full">
                                            </div>
                                        </label>

                                        {{-- Active Label --}}
                                        <span class="text-sm text-gray-600 dark:text-gray-300">Active</span>
                                    </div>
                                @else
                                    <span class="text-sm text-red-500 dark:text-red-400">Not Allowed</span>
                                @endcan
                            </td>

                            <td class="px-6 py-4">{{ $record->created_at ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $record->updated_at ?? '-' }}</td>
                            <td class="px-6 py-4 relative">

                                <x-select.action-dropdown>
                                    @can('role-show')
                                        <li class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <a href="{{ route('admin.roles', ['action' => 'show', 'id' => $record->id]) }}"
                                                wire:navigate class="flex items-center gap-2 px-4 py-2">
                                                <i class="fa-solid fa-eye"></i> Detail
                                            </a>
                                        </li>
                                    @endcan
                                    @can('role-edit')
                                        <li class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <a href="{{ route('admin.roles', ['action' => 'edit', 'id' => $record->id]) }}"
                                                wire:navigate class="flex items-center gap-2 px-4 py-2">
                                                <i class="fa-solid fa-pen-to-square"></i>Edit

                                            </a>
                                        </li>
                                    @endcan
                                    @can('role-delete')
                                        <li class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <a href="#" wire:click.prevent='delete({{ $record->id }})'
                                                wire:confirm='Are you sure?' wire:navigate
                                                class="flex items-center gap-2 px-4 py-2">
                                                <i class="fa-solid fa-trash"></i>Delete
                                            </a>
                                        </li>
                                    @endcan
                                </x-select.action-dropdown>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="px-25 py-4 text-center text-gray-500 dark:text-gray-400">
                                User Not Found.
                            </td>
                        </tr>
                    @endforelse
                </x-slot>
            </x-datatable.body>
        </x-slot>
    </x-datatable.table>

    <!-- Pagination -->
    <div class="p-4 bg-gray-100 dark:bg-gray-800 rounded-b-xl">
        @if ($roles)
            {{ $roles->links(data: ['scrollTo' => true]) }}
        @endif
    </div>
</div>
