<?php

namespace App\Http\Requests\Common;

use Illuminate\Foundation\Http\FormRequest;
use traits\SingleValidateErrorTrait;

class SendSmsCodeRequest extends FormRequest
{
    use SingleValidateErrorTrait;

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
