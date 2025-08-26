<?php

namespace App\Http\Requests\Role;

use App\Http\Requests\LivewireFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends LivewireFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function rules(): array
    {
        return [
            'name' => 'required|string|max:255|',
            'permissionsSelected' => 'required|array|min:1',
        ];
    }

    public static function messages(): array
    {
        return [
            'name.required'     => 'Please enter a name.',
            'name.min'          => 'Name must be at least 3 characters.'
        ];
    }
}
