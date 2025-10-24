<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|unique:products,name,' . $this->product->id . '|max:255',
            'amount' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string|max:255'
        ];
    }
}
