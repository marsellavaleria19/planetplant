<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email | unique:admins,email',
            'username' => 'required | unique:admins,username',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Nama wajib diisi.",
            'gender.required' => "Jenis kelamin wajib dipilih.",
            'address.required' => "Alamat wajib diisi.",
            'phone_number.required' => "Nomor telepon wajib diisi.",
            'phone_number.numeric' => "Nomor telepon harus berupa angka.",
            'email.required' => "Email wajib dipilih.",
            'email.email' => "Email wajib alamat email yang valid.",
            'email.unique' => "Alamat email sudah dipakai.",
            'address.required' => "Alamat wajib diisi.",
            'username.required' => "Username wajib diisi.",
            'username.unique' => "Username sudah dipakai.",
            'password.required' => "Password wajib diisi."
        ];
    }
}
