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
            'name'=>'required|string|max:255',
            'square_meters'=>'integer|required',
            'bathrooms'=>'required|integer',
            'rooms'=>'required|integer',
            'beds'=>'required|integer',
            'price'=>'required',
            'discount'=>'integer',
            'description'=>'string|max:500',
            'thumb'=>'image',
            'services'=>'array',
            'services.*'=>'string|exists:services,id'
        ];
    }
}
