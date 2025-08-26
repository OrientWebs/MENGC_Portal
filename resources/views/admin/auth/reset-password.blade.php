<x-guest-layout>
    <x-auth.authentication-card>
        <x-slot name="logo">
            <x-auth.authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" required="true" label="{{ $request->route('token') }}">

            <div class="block">
                <x-input.label for="email" required="true" label="{{ __('Email') }}" />
                <x-input.primary-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-input.label for="password" required="true" label="{{ __('Password') }}" />
                <x-input.primary-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-input.label for="password_confirmation" required="true" label="{{ __('Confirm Password') }}" />
                <x-input.primary-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button.primary-button>
                    {{ __('Reset Password') }}
                </x-button.primary-button>
            </div>
        </form>
    </x-auth.authentication-card>
</x-guest-layout>
