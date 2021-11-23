<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class ReceiverRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'id_city' => 'required',
            'type_city' => 'required',
            'city'=> 'required',
            'id_province' => 'required',
            'province' => 'required',
            'postalcode' => 'required',
            'phone_number' => 'required',
            'title' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Nama wajib diisi.",
            'address.required' => "Alamat wajib diisi.",
            'city.required' => "Kota wajib dipilih.",
            'province.required' => "Provinsi wajib dipilih.",
            'postalcode.required' => "Kodepos wajib diisi.",
            'phone_number.required' => "Nomor telepon wajib diisi.",
            'title.required' => "Referensi Alamat wajib diisi."
        ];
    }
}
