<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name'=>'required',
            'gender' => 'required',
            'phonenumber' => 'required',
            'email' => 'required|email',
            'username'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Nama wajib diisi.",
            'gender.required' => "Jenis kelamin wajib dipilih.",
            'phonenumber.required' => "Nomor telepon wajib diisi.",
            'email.required' => "Email wajib diisi.",
            'email.email'=>"Email wajib alamat email yang valid.",
            'username.required'=>"Username wajib diisi"
        ];
    }
}
