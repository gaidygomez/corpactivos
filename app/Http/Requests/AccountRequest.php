<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'bname' => ['required', 'string', 'max:50'],
            'bban' => ['required', 'numeric', 'min:20'],
            'ci' => ['required', 'string', 'regex:/[(a-zA-Z){1,1}]?[0-9]{6,12}+$/'],
            'phone' => ['required', 'string', 'regex:/^[+][0-9]{10,15}+$/'],
            'taccount' => ['required', 'string'],
            'bbank' => ['required', 'string'],
        ];
    }
}
