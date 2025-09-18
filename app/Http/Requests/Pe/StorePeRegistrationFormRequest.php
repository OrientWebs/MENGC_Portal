<?php

namespace App\Http\Requests\Pe;

use App\Http\Requests\LivewireFormRequest;

class StorePeRegistrationFormRequest extends LivewireFormRequest
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
            // Foreign key to main registration form
            'registration_id'          => 'nullable|integer|exists:registration_forms,id',

            // Permanent Contact Address
            'perm_address_en'          => 'required|string|max:255',
            'perm_address_mm'          => 'required|string|max:255',
            'perm_state_id'            => 'nullable|integer|exists:states,id',
            'perm_township_id'         => 'nullable|integer|exists:townships,id',
            'perm_post_code'           => 'nullable|string|max:20',
            'perm_tele_no'             => 'nullable|string|max:50',
            'perm_fax_no'              => 'nullable|string|max:50',
            'perm_email'               => 'nullable|email|max:100',

            // Designation and Office Address
            'des_address_en'           => 'required|string|max:255',
            'des_address_mm'           => 'required|string|max:255',
            'des_state_id'             => 'nullable|integer|exists:states,id',
            'des_township_id'          => 'nullable|integer|exists:townships,id',
            'des_post_code'            => 'nullable|string|max:20',
            'des_tele_no'              => 'nullable|string|max:50',
            'des_fax_no'               => 'nullable|string|max:50',
            'des_email'                => 'nullable|email|max:100',

            // Engineering Discipline
            'engineering_discipline_id' => 'nullable|integer|exists:engineering_disciplines,id',

            // Boolean requirements
            'exp_15_years'             => 'boolean',
            'meet_all_requirements'    => 'boolean',
            'no_disciplinary_action'   => 'boolean',
        ];
    }

    /**
     * Custom error messages
     */
    public static function messages(): array
    {
        return [
            'perm_address_en'        => 'Permanent address (English) must not exceed 255 characters.',
            'des_address_en'        => 'Designation address (English) must not exceed 255 characters.',
            'des_address_mm'        => 'Designation address (Myanmar) must not exceed 255 characters.',
            'perm_address_mm'        => 'Permanent address (Myanmar) must not exceed 255 characters.',
            'perm_email'           => 'Permanent email must be a valid email address.',
            'des_email'            => 'Designation email must be a valid email address.',
            'perm_state_id'       => 'Selected permanent state is invalid.',
            'perm_township_id'    => 'Selected permanent township is invalid.',
            'des_state_id'        => 'Selected designation state is invalid.',
            'des_township_id'     => 'Selected designation township is invalid.',
            'engineering_discipline_id' => 'Selected engineering discipline is invalid.',
        ];
    }
}
