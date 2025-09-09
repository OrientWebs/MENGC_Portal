@props(['disabled' => false, 'error' => false])

{{-- A single input --}}
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
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
