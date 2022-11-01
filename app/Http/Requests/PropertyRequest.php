<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'type' => ['required', 'email'],
            'category' => ['nullable', 'string'],
            'location' => ['nullable', 'number'],
            'value' => ['nullable', 'number'],
            'description' => ['nullable', 'string'],
        ];
    }
}
