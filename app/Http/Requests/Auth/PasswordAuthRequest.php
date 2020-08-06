<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use traits\SingleValidateErrorTrait;

class PasswordAuthRequest extends FormRequest
{
    use SingleValidateErrorTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => ['required'],
        ];
    }
}
