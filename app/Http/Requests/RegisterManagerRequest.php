<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterManagerRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:lodgers',
            'nik' => 'required|string|min:16|unique:lodgers',
            'ktp_img' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'required|string|min:6|confirmed',
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string',
        ];
    }
}
