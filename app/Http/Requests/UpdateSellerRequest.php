<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerRequest extends FormRequest
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
        $pass = '';
        if (request()->password) {
            $pass = 'min:6';
        }
        $sellerId = auth()->guard('seller')->user()->id;
        return [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:lodgers,email,' . $sellerId,
            'nik' => 'required|string|min:16|unique:lodgers,nik,' . $sellerId,
            'jenis_kelamin' => 'required|string|min:0|max:1',
            'ktp_img' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => [$pass, 'confirmed'],
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string',
        ];
    }
}
