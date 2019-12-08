<?php

namespace App\Http\Requests\BackEnd\PurchaseInvoice;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'date'           => 'required',
            'invoice_type'   => 'required',
            'supplier_id'    => 'required',
            'total_value'    => 'required',
        ];
    }
}
