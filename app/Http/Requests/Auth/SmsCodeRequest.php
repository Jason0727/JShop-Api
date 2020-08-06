<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use traits\SingleValidateErrorTrait;

class SmsCodeRequest extends FormRequest
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
            'phone' => [
                'required',
                'mobile'
            ],
        ];
    }

    /**
     * 自定义属性
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'phone' => '手机号码',
        ];
    }
}
