<?php

namespace App\Http\Requests\BackEnd\User;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
                'name'     => 'required',
                'desc'     => 'required',
                'address'  => 'required',
                'group_id' => 'required',
                'phone'    => 'required',
                'email'    => 'required',
            ];
    }
}
