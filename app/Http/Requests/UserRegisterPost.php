<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//マニュアルに従って記述
use Illuminate\Validation\Rule;

class UserRegisterPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>['required','max:128'],
            'email'=>['required','email','max:254'],
            'password'=>['required','max:72'],
        ];
    }
}
