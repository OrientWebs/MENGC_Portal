<?php

namespace App\Http\Requests\Registration;

use App\Http\Requests\LivewireFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreBaseRegistrationFormRequest extends LivewireFormRequest
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
            'register_no'            => 'required|string|max:50',
            'title'                  => 'required|string|max:50',
            'name_en'                => 'required|string|max:255',
            'name_mm'                => 'required|string|max:255',
            'dob'                    => 'required|date',
            'nrc_township_en'        => 'nullable|string|max:50',
            'nrc_township_mm'        => 'nullable|string|max:50',
            'nrc_state_en'           => 'nullable|string|max:50',
            'nrc_state_mm'           => 'nullable|string|max:50',
            'nrc_number_en'              => 'nullable|string|max:50',
            'nrc_number_mm'              => 'nullable|string|max:50',
            'nrc_type_en'            => 'nullable|string|max:50',
            'nrc_type_mm'            => 'nullable|string|max:50',
            'father_name_en'         => 'nullable|string|max:255',
            'father_name_mm'         => 'nullable|string|max:255',
            'email'                  => 'nullable|email|max:255|unique:registration_forms,email',
            'tele_no_en'             => 'nullable|string|max:50',
            'tele_no_mm'             => 'nullable|string|max:50',
            'address_en'             => 'nullable|string|max:500',
            'address_mm'             => 'nullable|string|max:500',
            'state_id'               => 'nullable|integer|exists:states,id',
            'township_id'            => 'nullable|integer|exists:townships,id',
            'fax_no'                 => 'nullable|string|max:50',
            'nationality_type'       => 'required|string|max:50',
            'permanent_resident_no'  => 'nullable|string|max:100',
            'gender'                 => 'required',

        ];
    }
}
