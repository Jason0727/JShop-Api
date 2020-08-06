<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-08-06
 * Time: 15:48
 */

namespace traits;


use App\Constant\ApiConstant;
use Illuminate\Contracts\Validation\Validator;

trait SingleValidateErrorTrait
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