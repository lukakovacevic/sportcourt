<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSportFieldRequest extends FormRequest
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
            'address' => 'string',
            'city_id' => 'integer|exists:cities,id',
            'type_id' => 'integer|exists:types,id',
            'country_id' => 'integer|exists:countries,id',
            'number_of_courts' => 'integer'
        ];
    }
}
