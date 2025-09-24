@props([
    'model', // required: wire:model binding (ex: nrc_card_front)
    'preview' => null, // optional: default preview URL (e.g. from DB)
])

<div x-data="{
    previewUrl: '{{ $preview ? $preview : '' }}',
    file: null,
    updatePreview(event) {
        if (event.target.files[0]) {
            const reader = new FileReader();
            reader.onload = e => this.previewUrl = e.target.result;
            reader.readAsDataURL(event.target.files[0]);
            this.file = event.target.files[0];
        }
    },
    clear() {
        this.previewUrl = null;
        this.file = null;
        $wire.set('{{ $model }}', null);
        $refs.input.value = null;
    }
}" class="w-full px-2 mb-4">

    <!-- File input -->
    <input x-ref="input" type="file" wire:model="{{ $model }}"
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none"
        @change="updatePreview($event)" />

    @error($model)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <!-- Alpine preview -->
    <template x-if="previewUrl">
        <div class="relative inline-block mt-2">
            <img :src="previewUrl" alt="Preview" class="w-32 h-32 object-cover rounded border" />
            <button type="button"
                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 text-xs hover:bg-red-600"
                @click="clear">
                ✕
            </button>
        </div>
    </template>
</div>
