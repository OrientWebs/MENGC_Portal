<x-guest-layout>
    <x-auth.authentication-card>
        <x-slot name="logo">
            <x-auth.authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-input.label for="password" label="{{ __('Password') }}" required="true" value="" />
                <x-input.primary-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-button.primary-button class="ms-4">
                    {{ __('Confirm') }}
                </x-button.primary-button>
            </div>
        </form>
    </x-auth.authentication-card>
</x-guest-layout>
