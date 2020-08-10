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
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

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
        throw new BadRequestHttpException($validator->errors()->first());
    }
}