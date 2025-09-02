<div>
    <div class="flex justify-between items-center mb-6">
        <x-breadcrumbs currentUrl="admin/users" :sub="['create' => 'admin.users.create']" />
    </div>
    <x-create.body>

        <form wire:submit.prevent="store">
            <div class="py-3">
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="type" label="Engineer Type" required="true" />
                        <x-select.search :data="$engType" selectedValue="type" placeholder="Choose a Type"
                            error="{{ $errors->has('type') }}">
                        </x-select.search>
                        @error('type')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full mb-4">
                        <x-input.label for="type" label="Description" required="true" />
                        <textarea id="message" rows="4" wire:model='description'
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>
                        @error('type')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <x-button.primary-button function="store">
                    {{ __('Save') }}
                </x-button.primary-button>
                <x-button.secondary-button type="button" href="{{ route('admin.prerequistics') }}" wire:navigate>
                    {{ __('Cancel') }}
                </x-button.secondary-button>
            </div>
        </form>
    </x-create.body>
</div>
