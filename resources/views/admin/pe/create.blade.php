<div>
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
                            value="PE App:000001" />
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="name" label="Title:(Prof:/Dr./Engr.)" required="true" />
                        <x-input.primary-input id="name" label="Name" type="text" wire:model="name"
                            class="additional-classes" error="{{ $errors->has('name') }}" />
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="name" label="Name(English)" required="true" />
                        <x-input.primary-input id="name" label="Name" type="text" wire:model="name_en"
                            oninput="this.value = this.value.replace(/[^\\x00-\\x7F]+/ig, '');"
                            class="additional-classes" error="{{ $errors->has('name') }}" />
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="name" label="Name (Myanmar)" required="true" />
                        <x-input.primary-input id="name_mm" type="text" wire:model="name_mm"
                            oninput="this.value = this.value.replace(/[^\u1000-\u109F\s]/g, '');"
                            class="additional-classes" error="{{ $errors->has('name_mm') }}" />

                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="name" label="Father Name (english)" required="true" />
                        <x-input.primary-input id="father_name_en" type="text" wire:model="father_name_en"
                            oninput="this.value = this.value.replace(/[^\\x00-\\x7F]+/ig, '');"
                            class="additional-classes" error="{{ $errors->has('father_name_en') }}" />

                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="name" label="Father Name(Myanamar)" required="true" />
                        <x-input.primary-input id="father_name_mm" type="text" wire:model="father_name_mm"
                            oninput="this.value = this.value.replace(/[^\u1000-\u109F\s]/g, '');"
                            class="additional-classes" error="{{ $errors->has('father_name_mm') }}" />

                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="name" label="Date of Birth" required="true" />
                        <x-input.primary-input id="dob" type="date" wire:model="dob" class="additional-classes"
                            error="{{ $errors->has('dob') }}" />
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="name" label="Nationality Type" required="true" />
                        <x-input.primary-input id="dob" type="select" wire:model="dob" class="additional-classes"
                            error="{{ $errors->has('dob') }}" />
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
