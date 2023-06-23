<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'square_meters' => 'integer|required|min:30',
            'bathrooms' => 'required|integer|min:1',
            'rooms' => 'required|integer|min:1',
            'beds' => 'required|integer|min:1',
            'price' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'discount' => 'integer|min:0',
            'description' => 'string|max:500',
            'thumb' => 'image',
            'services' => 'array',
            'services.*' => 'string|exists:services,id'
        ];
    }
}
