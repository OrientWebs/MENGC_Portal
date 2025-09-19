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
                        <x-select.dropdown class="w-full" wire:model="gender" error="{{ $errors->has('gender') }}">
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
                        <x-select.dropdown class="w-full" wire:model="nationality_type" id="nationality_type"
                            error="{{ $errors->has('nationality_type') }}" x-model="nationality">
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

                            <x-select.dropdown class="w-18" wire:model.live="nrc_state_en" id="nrc_state_en"
                                error="{{ $errors->has('nrc_state_en') }}">
                                @foreach ($nrcStates as $nrc)
                                    <option value="{{ $nrc->id }}">{{ $nrc->code_en }}</option>
                                @endforeach
                            </x-select.dropdown>

                            <x-select.dropdown class="w-18" wire:model="nrc_township_en" id="nrc_township_en"
                                error="{{ $errors->has('nrc_township_en') }}">
                                <option value="">Choose</option>
                                @foreach ($nrcTownshipsEn as $townsip)
                                    <option value="{{ $townsip->name_en }}">{{ $townsip->name_en }}</option>
                                @endforeach
                            </x-select.dropdown>

                            <x-select.dropdown class="w-18" wire:model="nrc_type_en" id="nrc_type_en"
                                error="{{ $errors->has('nrc_type_en') }}">
                                @foreach ($nrcTypes as $type)
                                    <option value="{{ $type->name_en }}">{{ $type->name_en }}</option>
                                @endforeach
                            </x-select.dropdown>

                            <x-input.primary-input id="nrc_number_en" type="number" wire:model="nrc_number_en"
                                inputType="en" class="w-full" error="{{ $errors->has('nrc_number_en') }}" />
                        </div>
                        @error('nrc_number_en')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- NRC Myanmar -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4" x-show="nationality === 'NRC'" x-cloak
                        x-transition>
                        <x-input.label for="nrc_mm" label="NRC Number (Myanmar)" />

                        <div class="flex w-50">
                            <x-select.dropdown class="w-18" wire:model.live="nrc_state_mm" id="nrc_state_mm"
                                error="{{ $errors->has('nrc_state_mm') }}">
                                <option value="">Choose</option>
                                @foreach ($nrcStates as $nrc)
                                    <option value="{{ $nrc->id }}">{{ $nrc->code_mm }}</option>
                                @endforeach
                            </x-select.dropdown>

                            <x-select.dropdown class="w-18" wire:model="nrc_township_mm" id="nrc_township_mm"
                                error="{{ $errors->has('nrc_township_mm') }}">
                                <option value="">Choose</option>
                                @foreach ($nrcTownshipsMm as $townsip)
                                    <option value="{{ $townsip->name_mm }}">{{ $townsip->name_mm }}</option>
                                @endforeach
                            </x-select.dropdown>

                            <x-select.dropdown class="w-18" wire:model="nrc_type_mm" id="nrc_type_mm"
                                error="{{ $errors->has('nrc_type_mm') }}">
                                @foreach ($nrcTypes as $type)
                                    <option value="{{ $type->name_mm }}">{{ $type->name_mm }}</option>
                                @endforeach
                            </x-select.dropdown>

                            <x-input.primary-input id="nrc_number_mm" type="text" wire:model="nrc_number_mm"
                                inputType="mmnum" class="w-full" error="{{ $errors->has('nrc_number_mm') }}" />
                        </div>
                        @error('nrc_number_mm')
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

            {{-- Contact Details --}}
            <div class="py-3">
                <div>
                    <h1 class="font-bold dark:text-white">2. Contact Detail</h1>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <!-- Permanent Contact Address (English) -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_en" label="Permanent Contact Address (English)"
                            required="true" />
                        <x-input.textarea id="perm_address_en" wire:model="perm_address_en"
                            class="additional-classes" error="{{ $errors->has('perm_address_en') }}" />
                        @error('perm_address_en')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- Permanent State -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_state_id" label="State" />
                        <x-select.search :data="$states" wire:model.live="perm_state_id" :error="$errors->has('perm_state_id')"
                            placeholder="Choose a state" />
                        @error('perm_state_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Township -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_township_id" label="Township" />
                        <x-select.dropdown class="w-full" wire:model.live="perm_township_id" id="perm_township_id"
                            error="{{ $errors->has('perm_township_id') }}">
                            <option value="">Choose a Township</option>
                            @foreach ($permTownships as $nrc)
                                <option value="{{ $nrc->id }}">{{ $nrc->name }}</option>
                            @endforeach
                        </x-select.dropdown>
                        @error('perm_township_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- Permanent Post Code -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_post_code" label="Post Code" />
                        <x-input.primary-input id="perm_post_code" type="text" wire:model="perm_post_code"
                            class="h-15" error="{{ $errors->has('perm_post_code') }}" />
                        @error('perm_post_code')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Tele No -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_tele_no" label="Tele No" />
                        <x-input.primary-input id="perm_tele_no" type="text" wire:model="perm_tele_no"
                            class="h-15" error="{{ $errors->has('perm_tele_no') }}" />
                        @error('perm_tele_no')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Fax No -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_fax_no" label="Fax No" />
                        <x-input.primary-input id="perm_fax_no" type="text" wire:model="perm_fax_no"
                            class="h-15" error="{{ $errors->has('perm_fax_no') }}" />
                        @error('perm_fax_no')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Email -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_email" label="Email" />
                        <x-input.primary-input id="perm_email" type="email" wire:model="perm_email" class="h-15"
                            error="{{ $errors->has('perm_email') }}" />
                        @error('perm_email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Permanent Contact Address (Myanmar) -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="perm_address_mm" label="Permanent Contact Address (Myanmar)"
                            required="true" />
                        <x-input.textarea id="perm_address_mm" wire:model="perm_address_mm" class="h-15"
                            error="{{ $errors->has('perm_address_mm') }}" />
                        @error('perm_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <!-- Designation and Office Address (English) -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="des_address_en" label="Designation and Office Address (English)"
                            required="true" />
                        <x-input.textarea id="des_address_en" wire:model="des_address_en" class="additional-classes"
                            error="{{ $errors->has('des_address_en') }}" />
                        @error('des_address_en')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Designation State -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="des_state_id" label="State" />
                        <x-select.search :data="$states" wire:model.live="des_state_id" :error="$errors->has('des_state_id')"
                            placeholder="Choose a state" />
                        @error('des_state_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Designation Township -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="des_township_id" label="Township" />
                        <x-select.dropdown class="w-full" wire:model.live="des_township_id" id="des_township_id"
                            error="{{ $errors->has('des_township_id') }}">
                            <option value="">Choose a Township</option>
                            @foreach ($desTownships as $nrc)
                                <option value="{{ $nrc->id }}">{{ $nrc->name }}</option>
                            @endforeach
                        </x-select.dropdown>
                        @error('des_township_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Designation Post Code -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="des_post_code" label="Post Code" />
                        <x-input.primary-input id="des_post_code" type="text" wire:model="des_post_code"
                            class="h-15" error="{{ $errors->has('des_post_code') }}" />
                        @error('des_post_code')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Designation Tele No -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="des_tele_no" label="Tele No" />
                        <x-input.primary-input id="des_tele_no" type="text" wire:model="des_tele_no"
                            class="h-15" error="{{ $errors->has('des_tele_no') }}" />
                        @error('des_tele_no')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Designation Fax No -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="des_fax_no" label="Fax No" />
                        <x-input.primary-input id="des_fax_no" type="text" wire:model="des_fax_no" class="h-15"
                            error="{{ $errors->has('des_fax_no') }}" />
                        @error('des_fax_no')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Designation Email -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="des_email" label="Email" />
                        <x-input.primary-input id="des_email" type="email" wire:model="des_email" class="h-15"
                            error="{{ $errors->has('des_email') }}" />
                        @error('des_email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Designation and Office Address (Myanmar) -->
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                        <x-input.label for="des_address_mm" label="Designation and Office Address (Myanmar)"
                            required="true" />
                        <x-input.textarea id="des_address_mm" wire:model="des_address_mm" class="h-15"
                            error="{{ $errors->has('des_address_mm') }}" />
                        @error('des_address_mm')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
            </div>

            {{-- DECLARATION --}}
            <div class="py-3">
                <div>
                    <h1 class="font-bold dark:text-white">4.DISCIPLINES FOR REGISTRATION(select 1 preferred
                        discipline for registration purpose)
                    </h1>
                </div>

                <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                    <x-input.label for="engineering_discipline_id" label="Engineering Discipline " required="true" />
                    <x-select.search :data="$engineeringDisciplines" wire:model.live="engineering_discipline_id" :error="$errors->has('engineering_discipline_id')"
                        placeholder="Choose a DISCIPLINES" />
                    @error('engineering_discipline_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">

            </div>

            {{-- DECLARATION --}}
            <div class="py-3">
                <div>
                    <h1 class="font-bold dark:text-white">9. DECLARATION</h1>
                </div>

                {{-- Exp 15 Years --}}
                <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                    <x-input.label for="exp_15_years"
                        label="I have been working as a responsible person in Engineering works for 15 years"
                        required="false" />

                    <div class="flex items-center space-x-6 mt-2">
                        <!-- Yes option -->
                        <label for="exp_15_years_yes" class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" id="exp_15_years_yes" value="1" wire:model="exp_15_years"
                                class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">Yes</span>
                        </label>

                        <!-- No option -->
                        <label for="exp_15_years_no" class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" id="exp_15_years_no" value="0" wire:model="exp_15_years"
                                class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">No</span>
                        </label>
                    </div>

                    @error('exp_15_years')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Meet Requirement --}}
                <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                    <x-input.label for="exp_15_years"
                        label="I will meet all the requirements of the Myanmar Engineering Council."
                        required="false" />

                    <div class="flex items-center space-x-6 mt-2">
                        <!-- Yes option -->
                        <label for="meet_all_requirements_yes" class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" id="meet_all_requirements_yes" value="1"
                                wire:model="meet_all_requirements"
                                class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">Yes</span>
                        </label>

                        <!-- No option -->
                        <label for="meet_all_requirements_no" class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" id="meet_all_requirements_no" value="0"
                                wire:model="meet_all_requirements"
                                class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">No</span>
                        </label>
                    </div>

                    @error('meet_all_requirements')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- disciplinary action --}}
                <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-4">
                    <x-input.label for="exp_15_years" label="No disciplinary action has been taken against me"
                        required="false" />

                    <div class="flex items-center space-x-6 mt-2">
                        <!-- Yes option -->
                        <label for="no_disciplinary_action_yes" class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" id="no_disciplinary_action_yes" value="1"
                                wire:model="no_disciplinary_action"
                                class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">Yes</span>
                        </label>

                        <!-- No option -->
                        <label for="no_disciplinary_action_no" class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" id="no_disciplinary_action_no" value="0"
                                wire:model="no_disciplinary_action"
                                class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                            <span class="text-gray-700 dark:text-gray-300">No</span>
                        </label>
                    </div>

                    @error('no_disciplinary_action')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
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
