<?php

namespace App\Http\Requests\Registration;

use App\Http\Requests\LivewireFormRequest;
use Illuminate\Validation\Validator;

class UpdateBaseRegistrationFormRequest extends LivewireFormRequest
{
    public function authorize(): bool
    {
        return true; // allow
    }

    public static function rules(): array
    {
        return [
            'register_no' => 'required|string|max:50',
            'title' => 'required|string|max:50',
            'name_en' => 'required|string|max:255',
            'name_mm' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'nationality_type' => 'required|string|in:PR,NRC',
            'permanent_resident_no' => 'nullable|string|max:100',

            'nrc_township_en' => 'nullable|string|max:50',
            'nrc_township_mm' => 'nullable|string|max:50',
            'nrc_type_en' => 'nullable|string|max:50',
            'nrc_type_mm' => 'nullable|string|max:50',
            'nrc_number_en' => 'nullable|string|max:50',
            'nrc_number_mm' => 'nullable|string|max:50',

            // image fields
            'nrc_card_front' => 'nullable|image|max:2048',
            'nrc_card_back'  => 'nullable|image|max:2048',

            // hidden inputs telling us if photos already exist
            'existing_nrc_card_front' => 'nullable|string',
            'existing_nrc_card_back'  => 'nullable|string',
        ];
    }

    public function withValidator(Validator $validator): void
    {
        // require permanent_resident_no if PR
        $validator->sometimes('permanent_resident_no', 'required|string|max:100', function ($input) {
            return $input->nationality_type === 'PR';
        });

        // require NRC fields if NRC selected
        $nrcFields = [
            'nrc_township_en',
            'nrc_township_mm',
            'nrc_type_en',
            'nrc_type_mm',
            'nrc_number_en',
            'nrc_number_mm'
        ];
        foreach ($nrcFields as $field) {
            $validator->sometimes($field, 'required|string|max:50', function ($input) {
                return $input->nationality_type === 'NRC';
            });
        }

        // require photos only if nationality=NRC AND no existing file
        $validator->sometimes('nrc_card_front', 'required|image|max:2048', function ($input) {
            return $input->nationality_type === 'NRC'
                && empty($input->existing_nrc_card_front);
        });

        $validator->sometimes('nrc_card_back', 'required|image|max:2048', function ($input) {
            return $input->nationality_type === 'NRC'
                && empty($input->existing_nrc_card_back);
        });
    }
}
