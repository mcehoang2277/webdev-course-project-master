<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'customer' => 'required|array',
            'customer.id' => 'nullable|string',
            'customer.name' => 'required|string',
            'customer.phone' => 'required|string',
            'items' => 'required|array',
            'items.*._id' => 'required|string',
            'items.*.name' => 'required|string',
            'items.*.category' => 'required|string',
            'items.*.price' => 'required|numeric',
            'items.*.quantity' => 'required|integer',
            'items.*.cheese' => 'nullable|string',
            'items.*.crust' => 'nullable|string',
            'total_price' => 'required|numeric',
            'note' => 'nullable|string',
            'address' => 'required|string',
            'payment_method' => 'required|string',
        ];
    }
}
