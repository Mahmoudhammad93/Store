<?php

namespace App\Http\Requests\BackEnd\Product;

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
            'name'    => 'required',
            'category_id'    => 'required',
            'unit_id'    => 'required',
            'desc'    => 'required',
            'sell_price'    => 'required',
            'pay_price'    => 'required',
            'expire_date'    => 'required',
            'quantity'    => 'required',
            'alert_quantity'    => 'required',
        ];
    }
}
