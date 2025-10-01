<?php

namespace App\Http\Requests\Pe;

use App\Http\Requests\LivewireFormRequest;

class StorePeAcademicQualificationsRequest extends LivewireFormRequest
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
            'first_university_id'          => 'nullable|integer',
            'first_graduation_year'          => 'nullable',
            'first_eng_disc_id'          => 'nullable|integer',
            'first_acad_qual_id'          => 'nullable|integer',
            'post_university_id'          => 'nullable|integer',
            'post_graduation_year'          => 'nullable',
            'post_eng_disc_id'          => 'nullable|integer',
            'post_acad_qual_id'          => 'nullable|integer',
            'other_eng_disc_id'          => 'nullable|integer',
            'other_graduation_year'          => 'nullable',
            'other_document_name_1'          => 'nullable',
            'other_document_name_2'          => 'nullable',
            'other_document_name_3'          => 'nullable',
            'other_document_name_4'          => 'nullable',
            'other_qualification'          => 'nullable',


        ];
    }

    /**
     * Custom error messages
     */
    public static function messages(): array
    {
        return [
            'perm_address_en'        => 'Permanent address (English) must not exceed 255 characters.',
        ];
    }
}
