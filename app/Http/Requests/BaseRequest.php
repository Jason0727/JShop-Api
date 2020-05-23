<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-05-23
 * Time: 16:10
 */

namespace App\Http\Requests;


use App\Constant\ApiConstant;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * 重构表单验证失败返回格式
     *
     * @param Validator $validator
     * @return array|void
     */
    protected function failedValidation(Validator $validator)
    {
        die(apiResponse(ApiConstant::PARAMS_ERROR, $validator->errors()->first()));
    }
}