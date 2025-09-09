<div>
    {{-- <div class="flex justify-between items-center mb-6">
        <x-breadcrumbs currentUrl="admin/users" :sub="['create' => 'admin.users.create']" />
    </div> --}}
    {{-- Title --}}
    <div class="text-center my-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Application For Professional Engineer
        </h1>
    </div>

    <x-create.body>

        <form wire:submit.prevent="store">
            <div class="py-3">
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="name" label="Register No" required="true" />
                        <x-input.primary-input id="name" label="Name" type="text" wire:model="name"
                            disabled="true" class="additional-classes" error="{{ $errors->has('name') }}"
                            value="Hello World" />
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <x-button.primary-button function="store">
                    {{ __('Save') }}
                </x-button.primary-button>
                <x-button.secondary-button type="button" href="{{ route('admin.dashboard') }}" wire:navigate>
                    {{ __('Cancel') }}
                </x-button.secondary-button>
            </div>
        </form>
    </x-create.body>
</div>
