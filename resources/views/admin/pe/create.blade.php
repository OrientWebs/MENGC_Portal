<div>
    <div class="text-center my-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Application For Professional Engineer
        </h1>
    </div>
    <x-create.body>
        <form wire:submit.prevent="store">

            {{-- Personal Details --}}
            <div class="py-3">
                <div>
                    <h1 class="font-bold dark:text-white">1. Personal Detail</h1>
                </div>
                <div class="flex flex-wrap -mx-2" x-data="{ nationality: '' }">
                    <!-- Register No -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="register_no" label="Register No" required="true" />
                        <x-input.primary-input id="register_no" type="text" wire:model="register_no" disabled="true"
                            class="additional-classes" error="{{ $errors->has('register_no') }}" />
                        @error('register_no')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Title -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="title" label="Title:(Prof:/Dr./Engr.)" required="true" />
                        <x-input.primary-input id="title" type="text" wire:model="title"
                            class="additional-classes" error="{{ $errors->has('title') }}" />
                        @error('title')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Name English -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="name_en" label="Name (English)" required="true" />
                        <x-input.primary-input id="name_en" type="text" wire:model="name_en" inputType="en"
                            class="additional-classes" error="{{ $errors->has('name_en') }}" />
                        @error('name_en')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Name Myanmar -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="name_mm" label="Name (Myanmar)" required="true" />
                        <x-input.primary-input id="name_mm" type="text" wire:model="name_mm" inputType="mm"
                            class="additional-classes" error="{{ $errors->has('name_mm') }}" />
                        @error('name_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Father English -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="father_name_en" label="Father Name (English)" />
                        <x-input.primary-input id="father_name_en" type="text" wire:model="father_name_en"
                            inputType="en" class="additional-classes" error="{{ $errors->has('father_name_en') }}" />
                        @error('father_name_en')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Father Myanmar -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="father_name_mm" label="Father Name (Myanmar)" />
                        <x-input.primary-input id="father_name_mm" type="text" wire:model="father_name_mm"
                            inputType="mm" class="additional-classes" error="{{ $errors->has('father_name_mm') }}" />
                        @error('father_name_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- DOB -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="dob" label="Date of Birth" required="true" />
                        <x-input.primary-input id="dob" type="date" wire:model="dob" class="additional-classes"
                            error="{{ $errors->has('dob') }}" />
                        @error('dob')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Gender -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="gender" label="Gender" required="true" />
                        <x-select.dropdown class="additional-classes w-full" wire:model="gender"
                            error="{{ $errors->has('gender') }}">
                            <option value="">Option</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </x-select.dropdown>
                        @error('gender')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nationality Type -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="nationality_type" label="Nationality Type" required="true" />
                        <x-select.dropdown class="additional-classes w-full" wire:model="nationality_type"
                            id="nationality_type" error="{{ $errors->has('nationality_type') }}" x-model="nationality">
                            <option value="">Choose PR or NRC</option>
                            <option value="PR">PR</option>
                            <option value="NRC">NRC</option>
                        </x-select.dropdown>
                        @error('nationality_type')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- PR Number -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4" x-show="nationality === 'PR'" x-cloak
                        x-transition>
                        <x-input.label for="permanent_resident_no" label="PR Number" />
                        <x-input.primary-input id="permanent_resident_no" type="text"
                            wire:model="permanent_resident_no" class="additional-classes"
                            error="{{ $errors->has('permanent_resident_no') }}" />
                        @error('permanent_resident_no')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- NRC English -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4" x-show="nationality === 'NRC'" x-cloak
                        x-transition>

                        <x-input.label for="nrc_en" label="NRC Number (English)" />
                        <div class="flex w-50">

                            <x-select.dropdown class="additional-classes w-18" wire:model.live="nrc_state_en"
                                id="nrc_state_en" error="{{ $errors->has('nrc_state_en') }}">
                                <option value="">Choose</option>
                                @foreach ($nrcStates as $nrc)
                                    <option value="{{ $nrc->code_en }}">{{ $nrc->code_en }}</option>
                                @endforeach
                            </x-select.dropdown>

                            <x-select.dropdown class="additional-classes w-18" wire:model="nrc_township_en"
                                id="nrc_township_en" error="{{ $errors->has('nrc_township_en') }}">
                                <option value="">Choose</option>
                                @foreach ($nrcTownshipsEn as $townsip)
                                    <option value="{{ $townsip->name_en }}">{{ $townsip->name_en }}</option>
                                @endforeach
                            </x-select.dropdown>

                            <x-select.dropdown class="additional-classes w-18" wire:model="nrc_type_en"
                                id="nrc_type_en" error="{{ $errors->has('nrc_type_en') }}">
                                @foreach ($nrcTypes as $type)
                                    <option value="{{ $type->name_en }}">{{ $type->name_en }}</option>
                                @endforeach
                            </x-select.dropdown>
                            <x-input.primary-input id="nrc_no_en" type="number" wire:model="nrc_no_en"
                                inputType="en" class="additional-classes w-full"
                                error="{{ $errors->has('nrc_no_en') }}" />
                        </div>
                        @error('nrc_en')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- NRC Myanmar -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4" x-show="nationality === 'NRC'" x-cloak
                        x-transition>
                        <x-input.label for="nrc_mm" label="NRC Number (Myanmar)" />

                        <div class="flex w-50">
                            <x-select.dropdown class="additional-classes w-18" wire:model.live="nrc_state_mm"
                                id="nrc_state_mm" error="{{ $errors->has('nrc_state_mm') }}">
                                <option value="">Choose</option>
                                @foreach ($nrcStates as $nrc)
                                    <option value="{{ $nrc->code_mm }}">{{ $nrc->code_mm }}</option>
                                @endforeach
                            </x-select.dropdown>

                            <x-select.dropdown class="additional-classes w-18" wire:model="nrc_township_mm"
                                id="nrc_township_mm" error="{{ $errors->has('nrc_township_mm') }}">
                                <option value="">Choose</option>
                                @foreach ($nrcTownshipsMm as $townsip)
                                    <option value="{{ $townsip->id }}">{{ $townsip->name_mm }}</option>
                                @endforeach
                            </x-select.dropdown>

                            <x-select.dropdown class="additional-classes w-18" wire:model="nrc_type_mm"
                                id="nrc_type_mm" error="{{ $errors->has('nrc_type_mm') }}">
                                @foreach ($nrcTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name_mm }}</option>
                                @endforeach
                            </x-select.dropdown>

                            <x-input.primary-input id="nrc_no_mm" type="text" wire:model="nrc_no_mm"
                                inputType="mmnum" class="additional-classes w-full"
                                error="{{ $errors->has('nrc_no_mm') }}" />
                        </div>
                        @error('nrc_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4" x-show="nationality === 'NRC'" x-cloak
                        x-transition>
                        <x-input.label label="NRC Card Photo (Front)" />
                        <x-input.primary-input id="nrc_mm" type="file" wire:model="nrc_mm"
                            class="additional-classes" error="{{ $errors->has('nrc_mm') }}" />
                        @error('nrc_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4" x-show="nationality === 'NRC'" x-cloak
                        x-transition>
                        <x-input.label label="NRC Card Photo (back)" />
                        <x-input.primary-input id="nrc_mm" type="file" wire:model="nrc_mm"
                            class="additional-classes" error="{{ $errors->has('nrc_mm') }}" />
                        @error('nrc_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
            </div>

            {{-- Contact Details
            <div class="py-3">
                <div>
                    <h1 class="font-bold dark:text-white">2. Contact Detail</h1>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <!-- Permanent Contact  -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_en" label="Permanent Contact Address(English)"
                            required="true" />
                        <x-input.textarea id="perm_address_en" type="text" wire:model="perm_address_en"
                            class="additional-classes" error="{{ $errors->has('perm_address_en') }}" />
                        @error('perm_address_en')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Contact  -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="State" required="true" />
                        <x-input.primary-input id="perm_address_mm" type="text" wire:model="perm_address_mm"
                            class="additional-classes h-15" error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Contact  -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="Township" required="true" />
                        <x-input.primary-input id="perm_address_mm" type="text" wire:model="perm_address_mm"
                            class="additional-classes h-15" error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Contact  -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="Post Code" required="true" />
                        <x-input.primary-input id="perm_address_mm" type="text" wire:model="perm_address_mm"
                            class="additional-classes h-15" error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Contact  -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="Tele No" required="true" />
                        <x-input.primary-input id="perm_address_mm" type="text" wire:model="perm_address_mm"
                            class="additional-classes h-15" error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Contact  -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="Fax No" required="true" />
                        <x-input.primary-input id="perm_address_mm" type="text" wire:model="perm_address_mm"
                            class="additional-classes h-15" error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Contact  -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="Email" required="true" />
                        <x-input.primary-input id="perm_address_mm" type="text" wire:model="perm_address_mm"
                            class="additional-classes h-15" error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Contact  -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="Permanent Contact Address(Myanmar)"
                            required="true" />
                        <x-input.textarea id="perm_address_mm" wire:model="perm_address_mm"
                            class="additional-classes h-15" error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_en" label="Designation and Office Address(English)"
                            required="true" />
                        <x-input.textarea id="perm_address_en" type="text" wire:model="perm_address_en"
                            class="additional-classes" error="{{ $errors->has('perm_address_en') }}" />
                        @error('perm_address_en')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="State" required="true" />
                        <x-input.primary-input id="perm_address_mm" type="text" wire:model="perm_address_mm"
                            class="additional-classes h-15" error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Contact  -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="Township" required="true" />
                        <x-input.primary-input id="perm_address_mm" type="text" wire:model="perm_address_mm"
                            class="additional-classes h-15" error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Contact  -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="Post Code" required="true" />
                        <x-input.primary-input id="perm_address_mm" type="text" wire:model="perm_address_mm"
                            class="additional-classes h-15" error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Contact  -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="Tele No" required="true" />
                        <x-input.primary-input id="perm_address_mm" type="text" wire:model="perm_address_mm"
                            class="additional-classes h-15" error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Contact  -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="Fax No" required="true" />
                        <x-input.primary-input id="perm_address_mm" type="text" wire:model="perm_address_mm"
                            class="additional-classes h-15" error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Contact  -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="Email" required="true" />
                        <x-input.primary-input id="perm_address_mm" type="text" wire:model="perm_address_mm"
                            class="additional-classes h-15" error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Contact  -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="Permanent Contact Address(Myanmar)"
                            required="true" />
                        <x-input.textarea id="perm_address_mm" wire:model="perm_address_mm"
                            class="additional-classes h-15" error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>



                </div>

                <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">


            </div> --}}

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
