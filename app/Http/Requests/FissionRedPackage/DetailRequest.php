<?php

namespace App\Http\Requests\FissionRedPackage;

use Illuminate\Foundation\Http\FormRequest;
use traits\SingleValidateErrorTrait;

class DetailRequest extends FormRequest
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
            'red_id' => [
                'required',
                'integer',
                'gt:0'
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
            'red_id' => '红包ID',
        ];
    }
}
