<?php

namespace App\Http\Requests;

use App\Models\Galeriwisata;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateWisataRequest extends FormRequest
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

    public function messages()
    {
        return [
            'galeri.max' => 'galeri cannot be more than 6 ',
            'galeri.required' => 'galeri must have at least 1',
        ];
    }
    public function rules()
    {
        $maxGaleri = 6 - count($this->wisata->galeriwisatas);
        $requiredGaleri = '';
        if (count($this->wisata->galeriwisatas) < 1) {
            $requiredGaleri = 'required';
        }
        return [
            'nama' => [
                'required', Rule::unique('wisatas')->ignore($this->wisata->nama, 'nama'),
            ],
            'deskripsi' => ['required'],
            'lokasi' => ['required'],
            'gambar' => ['image|mimes:jpeg,png,jpg,svg|max:2048'],
            'galeri' => [$requiredGaleri, 'array', 'max:' . $maxGaleri], // Ini nanti max 6 buat pengurangan di sama reouest inputnya
        ];
    }
}
