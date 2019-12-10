<?php

namespace App\Http\Requests\BackEnd\Request;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this requests.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the requests.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'supId'    => 'required',
            'phone'    => 'required',
            'requests'  => 'required'
        ];
    }
}
