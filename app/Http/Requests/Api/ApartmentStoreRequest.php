<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentStoreRequest extends FormRequest
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
            'address'=>'required|string',
            'city'=>'required|string',
            'state'=>'required|string',
            'square_meters'=>'integer|required',
            'bathrooms'=>'required|integer',
            'rooms'=>'required|integer',
            'price'=>'required',
            'discount'=>'integer',
            'description'=>'string|max:500',
            'cover_image'=>'image',
        ];
    }
}
