<?php

namespace App\Http\Requests\Prerequisctics;

use App\Http\Requests\LivewireFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StorePrerequiscticsRequest extends LivewireFormRequest
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
            "type" => "required|integer",
            "description" => "required:string",
        ];
    }
}