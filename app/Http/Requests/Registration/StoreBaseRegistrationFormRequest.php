<?php

namespace App\Http\Requests\Registration;

use App\Http\Requests\LivewireFormRequest;
use Illuminate\Validation\Validator;

class StoreBaseRegistrationFormRequest extends LivewireFormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public static function rules(): array
    {
        return [
            'register_no'            => 'required|string|max:50',
            'title'                  => 'required|string|max:50',
            'name_en'                => 'required|string|max:255',
            'name_mm'                => 'required|string|max:255',
            'dob'                    => 'required|date',
            'gender'                 => 'required|string',
            'nationality_type'       => 'required|string|in:PR,NRC',

            'permanent_resident_no'  => 'nullable|string|max:100',

            'nrc_state_en'           => 'nullable|integer',
            'nrc_state_mm'           => 'nullable|integer',
            'nrc_township_en'        => 'nullable|string|max:50',
            'nrc_township_mm'        => 'nullable|string|max:50',
            'nrc_type_en'            => 'nullable|string|max:50',
            'nrc_type_mm'            => 'nullable|string|max:50',
            'nrc_number_en'          => 'nullable|string|max:50',
            'nrc_number_mm'          => 'nullable|string|max:50',

            // file fields (make sure you use distinct property names in the Blade)
            // 'nrc_card_front'         => 'nullable|file|image|max:2048',
            // 'nrc_card_back'          => 'nullable|file|image|max:2048',
            'father_name_en' => 'nullable|string|max:255',
            'father_name_mm' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:registration_forms,email',
            'tele_no_en' => 'nullable|string|max:50',
            'tele_no_mm' => 'nullable|string|max:50',
            'address_en' => 'nullable|string|max:500',
            'address_mm' => 'nullable|string|max:500',
            'state_id' => 'nullable|integer|exists:states,id',
            'township_id' => 'nullable|integer|exists:townships,id',
            'fax_no' => 'nullable|string|max:50',
            // ...other rules...
        ];
    }

    /**
     * Add conditional rules using Validator::sometimes()
     *
     * @param Validator $validator
     * @return void
     */
    public function withValidator(Validator $validator): void
    {
        // PR requires permanent_resident_no
        $validator->sometimes('permanent_resident_no', 'required|string|max:100', function ($input) {
            return isset($input->nationality_type) && $input->nationality_type === 'PR';
        });

        // If NRC, require NRC-related fields
        $nrcFields = [
            'nrc_state_en',
            'nrc_state_mm',
            'nrc_township_en',
            'nrc_township_mm',
            'nrc_type_en',
            'nrc_type_mm',
            'nrc_number_en',
            'nrc_number_mm'
        ];

        foreach ($nrcFields as $field) {
            $validator->sometimes($field, 'required|string|max:50', function ($input) {
                return isset($input->nationality_type) && $input->nationality_type === 'NRC';
            });
        }

        // Require NRC card files when NRC is chosen
        $validator->sometimes('nrc_card_front', 'required|file|image|max:2048', function ($input) {
            // return isset($input->nationality_type) && $input->nationality_type === 'NRC';
        });
        $validator->sometimes('nrc_card_back', 'required|file|image|max:2048', function ($input) {
            // return isset($input->nationality_type) && $input->nationality_type === 'NRC';
        });
    }
}
