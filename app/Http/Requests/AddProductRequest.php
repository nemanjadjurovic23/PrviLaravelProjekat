<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "required|string|unique:products",
            "description" => "required|string",
            "amount" => "required|integer|min:0",
            "price" => "required|min:0",
            "image" => "required|mimes:jpg,jpeg,png|max:2048",
        ];
    }
}
