<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'id_receiver' => 'required',
            'id_billing' => 'required',
            'shipping_name' =>'required'
        ];
    }

    public function messages()
    {
        return [
            'id_receiver.required' => "Data Pengirim wajib diisi.",
            'id_billing.required' => "Data Penerima wajib diisi.",
            'shipping_name.required' => "Data Pengiriman wajib dipilih.",
        ];
    }
}
