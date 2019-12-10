<?php

namespace App\Http\Requests\BackEnd\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class SupplierBalanceStore extends FormRequest
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
            'supplier_id' => 'required',
            'desc' => 'required',
            'date' => 'required',
            'payment_type' => 'required',
            'depet_value' => 'required',
        ];
    }
}
