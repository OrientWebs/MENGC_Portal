@props([
    'model', // wire:model binding name
    'preview' => null, // initial preview URL (existing image)
    'maxSize' => 5, // MB
    'types' => ['image/jpeg', 'image/png', 'image/gif'], // allowed MIME types
])

<div x-data="{
    previewUrl: @js($preview ?? ''),
    errorMessage: '',
    maxSize: {{ $maxSize }} * 1024 * 1024, // bytes
    allowedTypes: @js($types),

    updatePreview(file) {
        if (!file) return;

        // Type check
        if (!this.allowedTypes.includes(file.type)) {
            this.errorMessage = 'This file type is not accepted.';
            this.clear(false);
            return;
        }

        // Size check
        if (file.size > this.maxSize) {
            this.errorMessage = 'File size exceeds {{ $maxSize }} MB.';
            this.clear(false);
            return;
        }

        // Passed validation
        this.errorMessage = '';
        const reader = new FileReader();
        reader.onload = e => this.previewUrl = e.target.result;
        reader.readAsDataURL(file);
    },

    clear(resetWire = true) {
        this.previewUrl = null;
        this.$refs.input.value = ''; // important: empty string, not null
        if (resetWire) $wire.set('{{ $model }}', null);
    }
}" class="w-full">
    <label
        class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed rounded-lg cursor-pointer
                  transition bg-gray-50 hover:bg-gray-100 border-gray-300
                  dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-500">

        <!-- Dropzone when no preview -->
        <template x-if="!previewUrl">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5.5 5.5 0 1115.9 6H16a5 5 0 010 10h-1m-4-3v6m0 0l-2-2m2 2l2-2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                    <span class="font-semibold">Click to upload</span> or drag and drop
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    Allowed: {{ implode(', ', array_map(fn($t) => strtoupper(explode('/', $t)[1]), $types)) }}
                    • Max: {{ $maxSize }} MB
                </p>
            </div>
        </template>

        <!-- Preview -->
        <template x-if="previewUrl">
            <div
                class="relative flex items-center justify-center w-full h-full overflow-hidden bg-gray-50 dark:bg-gray-700">
                <img :src="previewUrl" alt="Preview" class="object-contain w-full h-full" />
                <button type="button"
                    class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 text-xs hover:bg-red-600"
                    @click="clear()">
                    ✕
                </button>
            </div>
        </template>

        <!-- Always present input -->
        <input x-ref="input" type="file" class="hidden" wire:model="{{ $model }}"
            @change="updatePreview($event.target.files[0])" />
    </label>

    <!-- Client-side error -->
    <template x-if="errorMessage">
        {{-- <p class="text-red-500 text-sm mt-1" x-text="errorMessage"></p> --}}
    </template>

    <!-- Server-side error -->
    @error($model)
        {{-- <span class="text-red-500 text-sm">{{ $message }}</span> --}}
    @enderror
</div>
