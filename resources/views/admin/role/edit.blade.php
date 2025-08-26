<div>
    <div class="flex justify-between items-center mb-6">
        <x-breadcrumbs currentUrl="admin/roles" :sub="['edit' => 'admin.roles.edit']" />
    </div>
    <x-create.body>
        <form wire:submit.prevent="update">
            <div class="py-3">
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="name" label="Role Name" required="true" />
                        <x-input.primary-input id="name" type="text" wire:model="name" class="additional-classes"
                            error="{{ $errors->has('name') }}" />
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Permission Groups --}}
            <div class="mt-6">
                <h3 class="font-bold text-lg mb-2 dark:text-white">Assign Permissions</h3>
                @error('permissionsSelected')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($permissions as $group => $perms)
                        <div x-data="{
                            groupIds: {{ $perms->pluck('id')->toJson() }},
                            get allChecked() {
                                return this.groupIds.every(id => $wire.permissionsSelected.includes(id));
                            },
                            get someChecked() {
                                return this.groupIds.some(id => $wire.permissionsSelected.includes(id)) && !this.allChecked;
                            },
                            toggleAll($event) {
                                if ($event.target.checked) {
                                    this.groupIds.forEach(id => {
                                        if (!$wire.permissionsSelected.includes(id)) {
                                            $wire.permissionsSelected.push(id);
                                        }
                                    });
                                } else {
                                    $wire.permissionsSelected = $wire.permissionsSelected.filter(id => !this.groupIds.includes(id));
                                }
                            }
                        }" x-init="$watch('$wire.permissionsSelected', () => {
                            $refs.selectAll.indeterminate = someChecked;
                        })"
                            class="border rounded-xl dark:border-gray-500 p-4 shadow-sm bg-white dark:bg-gray-800">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="font-semibold text-gray-800 dark:text-gray-200">
                                    {{ ucfirst($group) }}
                                </h4>
                                {{-- Select All Checkbox --}}
                                <label class="flex items-center space-x-1 text-xs text-gray-600 dark:text-gray-300">
                                    <input type="checkbox" x-ref="selectAll" :checked="allChecked"
                                        @change="toggleAll($event)"
                                        class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <span>Select All</span>
                                </label>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                @foreach ($perms as $permission)
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" wire:model="permissionsSelected"
                                            value="{{ $permission->id }}"
                                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-sm text-gray-700 dark:text-gray-300">
                                            {{ Str::after($permission->name, '-') }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="pt-6 flex gap-3">
                <x-button.primary-button function="store">
                    {{ __('Save') }}
                </x-button.primary-button>
                <x-button.secondary-button type="button" href="{{ route('admin.roles') }}" wire:navigate>
                    {{ __('Cancel') }}
                </x-button.secondary-button>
            </div>
        </form>
    </x-create.body>
</div>
