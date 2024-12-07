<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdProductRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'images' => 'required|json',
            'category' => 'required|string|max:255',
            'prices' => 'required|json',
            'prices.*' => 'numeric|between:0,999999,99',
            'promotional_price' => 'nullable|numeric|between:0,999999,99',
            'quantity' => 'required|integer|between:1,999999',
            'locate' => 'required|string|max:255',
            'tags' => 'required|json',
        ];
    }
}
