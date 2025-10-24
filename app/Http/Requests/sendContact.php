<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sendContact extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|string',
            'subject' => 'required|string',
            'description' => 'required|string|min:5',
        ];
    }
}
