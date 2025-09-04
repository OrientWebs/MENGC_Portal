<x-guest-layout>
    <x-auth.authentication-card>
        <x-slot name="logo">
            <x-auth.authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input.label for="email" label="{{ __('Email') }}" required="true" />
                <x-input.primary-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-input.label for="password" label="{{ __('Password') }}" required="true" />
                <x-input.primary-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <span class="text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline">
                        Sign up
                    </a>
                </span>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button.primary-button class="ms-4">
                    {{ __('Log in') }}
                </x-button.primary-button>
            </div>
        </form>
    </x-auth.authentication-card>
</x-guest-layout>
