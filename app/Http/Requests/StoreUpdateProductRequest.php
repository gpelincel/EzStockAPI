<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|min:3',
            'price_cost' => 'required|numeric|min:0',
            'price_sale' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'id_metric' => 'required|numeric|min:1',
            'id_supplier' => 'required|numeric|min:1',
            'id_brand' => 'required|numeric|min:1',
        ];
    }
}
