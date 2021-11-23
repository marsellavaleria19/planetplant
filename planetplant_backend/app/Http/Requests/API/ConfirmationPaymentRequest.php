<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmationPaymentRequest extends FormRequest
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

     public getTotal($total){
        
     }

    public function rules()
    {
        return [
            'name' =>'required',
            'id_transaction'=>'required',
            'transfer_date' => 'required',
            'slip_transfer' => 'required | max : 2000',
            'payment' => 'required|lte:'.$total.'|gt:0',
            'id_payment_type' => 'required'
        ];
    }
}
