@props(['disabled' => false, 'error' => false, 'inputType' => null])

@php
    $onInput = match ($inputType) {
        'en' => "this.value = this.value.replace(/[^\\x00-\\x7F]+/ig, '');", // only ASCII
        'mm' => "this.value = this.value.replace(/[^\\u1000-\\u109F\\s]/g, '');", // only Myanmar letters
        'num' => "this.value = this.value.replace(/[^0-9]/g, '');", // only 0-9
        'mmnum' => "this.value = this.value.replace(/[^\\u1040-\\u1049]/g, '');", // only Myanmar digits (၀-၉)
        default => null,
    };
@endphp

<input {{ $disabled ? 'disabled' : '' }} oninput="{{ $onInput }}" {!! $attributes->merge([
    'class' =>
        'border text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 ' .
        ($disabled
            ? 'bg-gray-200 cursor-not-allowed dark:bg-gray-600 dark:text-gray-400'
            : 'bg-gray-50 dark:bg-gray-700 dark:text-white') .
        ' ' .
        ($error
            ? 'border-red-500 focus:ring-red-500 dark:border-red-500 focus:border-red-500'
            : 'border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:border-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500'),
]) !!}>
