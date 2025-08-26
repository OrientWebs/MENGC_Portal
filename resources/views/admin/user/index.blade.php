<div>
    <div class="flex justify-between items-center mb-6">
        <x-breadcrumbs currentUrl="admin/users" />

        @can('user-create')
            <x-button.secondary-button type="button" function="create" wire:navigate
                href="{{ route('admin.users', ['action' => 'create']) }}">
                <i class="fa-solid fa-user-plus mr-2"></i>Create
            </x-button.secondary-button>
        @endcan
    </div>

    <x-datatable.table>
        {{-- Table Header --}}
        <x-slot name="tableHeader">
            <div>
                <x-input.label label="Role:"></x-input.label>
                <x-select.dropdown wire:model.live="filterRole" class="additional-classes w-full">
                    <option value="">Option</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </x-select.dropdown>
            </div>
            <div>
                <x-input.label label="Date:"></x-input.label>
                <input type="date" wire:model.live.debounce.500ms="filterDate"
                    class="w-full mt-1 rounded-md dark:bg-gray-800 dark:text-white border-gray-300 dark:border-gray-600" />
            </div>
        </x-slot>

        {{-- Table Body --}}
        <x-slot name="tableBody">
            <x-datatable.body :function="['filterRole']">
                <x-slot name="header">
                    <tr class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-900 dark:text-gray-400">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">User Nmae</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Role</th>
                        <th scope="col" class="px-6 py-3">Active</th>
                        <th scope="col" class="px-6 py-3">Create Date</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </x-slot>

                <x-slot name="body">
                    @forelse($users as $index => $record)
                        <tr
                            class="bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $record->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $record->email ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $record->roles->first()->name ?? '-' }}</td>
                            <td class="px-6 py-4">
                                @can('user-edit')
                                    <div class="flex items-center gap-2">
                                        {{-- Toggle --}}
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" wire:click="toggleActive({{ $record->id }})"
                                                @checked($record->is_active) class="sr-only peer">
                                            <div
                                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-green-500
                                                        after:content-[''] after:absolute after:w-5 after:h-5 after:top-0.5 after:left-[2px]
                                                        after:bg-white after:rounded-full after:transition-all peer-checked:after:translate-x-full">
                                            </div>
                                        </label>

                                        {{-- Active Label --}}
                                        <span class="text-sm text-gray-600 dark:text-gray-300">Active</span>
                                    </div>
                                @else
                                    <span class="text-sm text-red-500 dark:text-red-400">Not Allowed</span>
                                @endcan
                            </td>

                            <td class="px-6 py-4">
                                {{ $record->created_at ?? '-' }}</td>
                            <td class="px-6 py-4 relative">

                                <x-select.action-dropdown>
                                    @can('user-show')
                                        <li class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <a href="{{ route('admin.users', ['action' => 'show', 'id' => $record->id]) }}"
                                                wire:navigate class="flex items-center gap-2 px-4 py-2">
                                                <i class="fa-solid fa-eye"></i> Detail
                                            </a>
                                        </li>
                                    @endcan
                                    @can('user-edit')
                                        <li class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <a href="{{ route('admin.users', ['action' => 'edit', 'id' => $record->id]) }}"
                                                wire:navigate class="flex items-center gap-2 px-4 py-2">
                                                <i class="fa-solid fa-pen-to-square"></i>Edit

                                            </a>
                                        </li>
                                    @endcan
                                    @can('user-delete')
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
        @if ($users)
            {{ $users->links(data: ['scrollTo' => true]) }}
        @endif
    </div>
</div>
