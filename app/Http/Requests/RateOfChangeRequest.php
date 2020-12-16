<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RateOfChangeRequest extends FormRequest
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
            'dolar_peso' => 'required | string',
            'dolar_bs' => 'required | string',
            'pesos_bs' => 'required | string'
        ];
    }
}
