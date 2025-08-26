<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\LivewireFormRequest;
use Livewire\Livewire;

class UserStoreRequest extends LivewireFormRequest
{
    public static function rules(): array
    {
        return [
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id'  => 'required|exists:roles,id',
        ];
    }

    public static function messages(): array
    {
        return [
            'name.required'     => 'Please enter a name.',
            'name.min'          => 'Name must be at least 3 characters.',
            'email.required'    => 'Please enter an email address.',
            'email.email'       => 'Please enter a valid email address.',
            'email.unique'      => 'This email is already taken.',
            'password.required' => 'Please enter a password.',
            'password.min'      => 'Password must be at least 6 characters.',
        ];
    }
}
