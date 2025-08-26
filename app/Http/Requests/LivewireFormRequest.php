<?php

namespace App\Http\Requests;

use Livewire\Component;

abstract class LivewireFormRequest
{
    /**
     * Author : Ye Htun
     * Date : 2023-10-20
     * Define rules in child class
     * @return array
     */
    abstract public static function rules(): array;

    /**
     * Define messages in child class (optional)
     */
    public static function messages(): array
    {
        return [];
    }

    /**
     * Author : Ye Htun
     * Date : 2023-10-20
     * Define validation rules and messages for Livewire components
     * @param Component $component
     * @param int|null $id
     * @return array
     * Validate Livewire component properties
     */
    public static function validate(Component $component, $id = null): array
    {
        return $component->validate(
            static::rules(),
            static::messages()
        );
    }
}
