<x-profile.form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-input.label for="current_password" required="true" label="{{ __('Current Password') }}" />
            <x-input.primary-input id="current_password" type="password" class="mt-1 block w-full"
                wire:model="state.current_password" autocomplete="current-password" />
            <x-input.input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-input.label for="password" required="true" label="{{ __('New Password') }}" />
            <x-input.primary-input id="password" type="password" class="mt-1 block w-full" wire:model="state.password"
                autocomplete="new-password" />
            <x-input.input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-input.label for="password_confirmation" required="true" label="{{ __('Confirm Password') }}" />
            <x-input.primary-input id="password_confirmation" type="password" class="mt-1 block w-full"
                wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input.input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-profile.action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-profile.action-message>

        <x-button.primary-button>
            {{ __('Save') }}
        </x-button.primary-button>
    </x-slot>
</x-profile.form-section>
