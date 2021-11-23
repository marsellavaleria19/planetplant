<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'code' => 'required| unique:items,code',
            'name'=>'required',
            'price'=>'required',
            'discount'=>'required',
            'id_type'=>'required',
            'qty' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => "Kode wajib diisi.",
            'code.unique' => "Kode sudah dipakai.",
            'name.required' => "Nama wajib diisi.",
            'price.required' => "Harga wajib diisi.",
            'discount.required' => "Diskon wajib diisi.",
            'id_type.required' => "Tipe barang wajib dpilih.",
            'qty.required' => "Kuantiti wajib diisi.",
        ];
    }
}
