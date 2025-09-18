<div>
    <div class="flex justify-between items-center mb-6">
        <x-breadcrumbs currentUrl="admin/users" :sub="['edit' => 'admin.users.edit']" />
    </div>
    <x-create.body>
        <form wire:submit.prevent="update">
            <div class="py-3">
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="name" label="User Name" required="true" />
                        <x-input.primary-input id="name" label="Name" type="text" wire:model="name"
                            class="additional-classes" error="{{ $errors->has('name') }}" />
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="email" label="Email" required="true" />
                        <x-input.primary-input id="email" label="Email" type="email" wire:model="email"
                            class="additional-classes" error="{{ $errors->has('email') }}" />
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="password" label="Password" required="true" />
                        <x-input.primary-input id="password" label="Password" type="password" wire:model="password"
                            class="additional-classes" error="{{ $errors->has('password') }}" />
                        @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="member_id" label="Member" required="true" />
                        {{-- <x-select.search :data="$roles" selectedValue="role_id" placeholder="Choose a Role"
                            error="{{ $errors->has('role_id') }}">
                        </x-select.search> --}}
                        <x-select.search :data="$roles" :error="$errors->has('role_id')" wire:model="role_id" placeholder="Choose a Role" />

                        @error('role_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <x-button.primary-button function="update">
                    {{ __('Update') }}
                </x-button.primary-button>
                <x-button.secondary-button type="button" href="{{ route('admin.users') }}" wire:navigate>
                    {{ __('Cancel') }}
                </x-button.secondary-button>
            </div>
        </form>
    </x-create.body>
</div>
