<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class WxAuthRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'platform_id' => ['required'],
            'code' => ['required'],
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
            'platform_id' => '平台',
            'code' => '授权码',
            'encrypted_data' => '加密用户数据',
            'iv' => '初始向量',
        ];
    }
}
