<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'desc' => ['required', 'string'],
            'category' => ['required', 'string'],
            'imgURL' => ['required', 'image', 'mimes:jpg,jpeg,png'],
            'additionalProperties' => ['sometimes', 'array'],
            'additionalProperties.variant' => ['nullable', 'string'],
            'additionalProperties.topping' => ['nullable', 'string'],
        ];
    }
}
