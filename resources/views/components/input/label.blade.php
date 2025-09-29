@props([
    'label' => '',
    'required' => false,
    'for' => '',
])

<label for="{{ $for }}"
    {{ $attributes->merge([
        'class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white',
    ]) }}>
    {{ $label }}

    @if ($required)
        <span class="text-red-500">*</span>
    @endif
</label>
