<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentSearchRequest extends FormRequest
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
            'service_id'=> 'exists:services,id',
            'address'=>'string',
            'city'=>'string',
            'state'=>'string',
            'price_max'=>'integer',
            'price_min'=>'integer',
        ];
    }
}
