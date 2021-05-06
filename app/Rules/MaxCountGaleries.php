<?php

namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;


class MaxCountGaleries implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $wisata = route('wisatas.edit');
        dd($wisata);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $galeriewisatas = DB::table('galeriwisatas')->where('wisata_id', $wisata->id)->get();

        return (count($value) <= '6') ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        dd('YEKJKHKJ');
        return 'Foto tidak boleh lebih dari 6.';
    }
}
