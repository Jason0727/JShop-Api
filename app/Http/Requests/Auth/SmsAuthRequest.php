<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class SmsAuthRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'platform_id' => [
                'required',
//                'exists:'
            ],
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
            'platform_id' => '平台',
            'phone' => '手机号码',
        ];
    }
}
