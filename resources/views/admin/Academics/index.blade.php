<div>
    @can('academic-create')
        <div class="flex justify-between items-center mb-6">
            <x-breadcrumbs currentUrl="admin/academics" />
            <div class="flex justify-end mb-3">
                <x-button.secondary-button type="button" wire:navigate
                    href="{{ route('admin.academics', ['action' => 'create']) }}">
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
                        <th scope="col" class="px-6 py-3">Create Date</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </x-slot>

                <x-slot name="body">
                    @forelse($academics as $index => $record)
                        <tr
                            class="bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $record->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $record->created_at ?? '-' }}</td>
                            <td class="px-6 py-4 relative">

                                <x-select.action-dropdown>
                                    @can('state-edit')
                                        <li class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <a href="{{ route('admin.states', ['action' => 'edit', 'id' => $record->id]) }}"
                                                wire:navigate class="flex items-center gap-2 px-4 py-2">
                                                <i class="fa-solid fa-pen-to-square"></i>Edit

                                            </a>
                                        </li>
                                    @endcan
                                    @can('state-delete')
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
                                States Not Found.
                            </td>
                        </tr>
                    @endforelse
                </x-slot>
            </x-datatable.body>
        </x-slot>
    </x-datatable.table>

    <!-- Pagination -->
    <div class="p-4 bg-gray-100 dark:bg-gray-800 rounded-b-xl">
        @if ($academics)
            {{ $academics->links(data: ['scrollTo' => true]) }}
        @endif
    </div>
</div>
