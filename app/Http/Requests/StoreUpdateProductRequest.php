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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|max:255|min:3",
            "price_coast" => "required|decimal:2|min:0",
            "price_sale" => "required|decimal:2|min:0",
            "quantity" => "required|decimal:2|min:0",
            "fabricated_at" => "date_format:dd-MM-yyyy",
            "valid_until" => "date_format:dd-MM-yyyy",
            "id_metric" => "min:0",
            "id_supplier" => "min:0",
            "id_brand" => "min:0",
        ];
    }
}
