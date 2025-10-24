<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateContact extends FormRequest
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
            'email' => 'required|string',
            'subject' => 'required|string',
            'message' => 'nullable|max:1000'
        ];
    }
}
