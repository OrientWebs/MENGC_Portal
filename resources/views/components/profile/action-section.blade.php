<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-profile.section-title>
        <x-slot name="title">
            <data value="" class="dark:text-gray-300">
                {{ $title }}
            </data>
        </x-slot>
        <x-slot name="description">
            <div class="dark:text-gray-500">
                {{ $description }}
            </div>
        </x-slot>
    </x-profile.section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="px-4 py-5 sm:p-6 bg-white dark:bg-gray-800 dark:text-gray-400 shadow sm:rounded-lg">
            {{ $content }}
        </div>
    </div>
</div>
