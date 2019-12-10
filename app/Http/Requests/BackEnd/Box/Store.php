<?php

namespace App\Http\Requests\BackEnd\Box;

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
            'type'    => 'required',
            'value'    => 'required',
            'date'    => 'required',
            'desc'    => 'required',
        ];
    }
}
