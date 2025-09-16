<?php

namespace App\Http\Requests;

use Livewire\Component;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator as LaravelValidator;

abstract class LivewireFormRequest
{
    /**
     * Author :  Ye Htut Aung
     * Date  :  2025-09-16
     * Child classes must implement static rules().
     */
    abstract public static function rules(): array;

    /**
     * Optional messages.
     */
    public static function messages(): array
    {
        return [];
    }

    /**
     * Validate a Livewire Component against the request rules.
     *
     * This method:
     *  - collects public properties from the component,
     *  - calls prepareForValidation() on the request if defined,
     *  - builds a Validator,
     *  - calls withValidator($validator) if defined (so sometimes() works),
     *  - validates and returns validated input.
     *
     * @param Component $component
     * @param int|null $id
     * @return array
     */
    public static function validate(Component $component, $id = null): array
    {
        $instance = new static();

        // 1) collect data from Livewire component (try Livewire API, fallback to public props)
        if (method_exists($component, 'getPublicProperties')) {
            $data = $component->getPublicProperties();
        } elseif (method_exists($component, 'getPublicPropertiesDefinedBySubClass')) {
            $data = $component->getPublicPropertiesDefinedBySubClass();
        } else {
            // fallback: get public properties
            $data = get_object_vars($component);
        }

        if ($id !== null) {
            $data['id'] = $id;
        }

        // 2) allow request to mutate input before validation
        if (method_exists($instance, 'prepareForValidation')) {
            $prepared = $instance->prepareForValidation($data);
            if (is_array($prepared)) {
                $data = $prepared;
            }
        }

        // 3) make validator
        $validator = ValidatorFacade::make($data, static::rules(), static::messages());

        // 4) allow request to add dynamic rules (sometimes) by calling withValidator
        if (method_exists($instance, 'withValidator')) {
            $instance->withValidator($validator);
        }

        // 5) run validation
        $validator->validate();

        // return validated data
        return $validator->validated();
    }
}
