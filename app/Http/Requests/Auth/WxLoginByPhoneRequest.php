<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use traits\SingleValidateErrorTrait;

class WxLoginByPhoneRequest extends FormRequest
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
//            'code' => ['required'],
//            'encrypted_data' => ['required'],
//            'iv' => ['required'],
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
            'code' => '授权码',
            'encrypted_data' => '加密用户数据',
            'iv' => '初始向量',
        ];
    }
}
