<?php

namespace App\Http\Requests\BackEnd\Reservation;

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
            'patient_no'    => 'required',
            'name'          => 'required',
            'gender'        => 'required',
            'address'       => 'required',
            'date_of_birth' => 'required',
            'res_expire_date' => 'required',
            'phone'         => 'required',
            'notes'         => 'required'
        ];
    }
}
