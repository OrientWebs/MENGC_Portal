<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\LivewireFormRequest;

class UserUpdateRequest extends LivewireFormRequest
{
    // property to hold current user id
    protected static ?int $currentId = null;

    public static function rules($id = null): array
    {
        // fallback to property if $id မလာဘူး
        $id = $id ?? static::$currentId;

        return [
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
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
            'password.min'      => 'Password must be at least 6 characters.',
        ];
    }

    // helper to set id before validate
    public static function withId($id)
    {
        static::$currentId = $id;
        return new static;
    }
}
