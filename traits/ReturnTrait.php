<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-06-02
 * Time: 13:32
 */

namespace traits;

trait ReturnTrait
{
    /**
     * 错误码
     *
     * @var
     */
    protected $errCode = 0;

    /**
     * 错误消息
     *
     * @var
     */
    protected $errMsg = "";

    /**
     * 返回数据
     *
     * @var array
     */
    protected $data = [];

    /**
     * 设置错误码
     *
     * @param $errCode
     * @return $this
     */
    public function setErrCode($errCode)
    {
        $this->errCode = $errCode;

        return $this;
    }

    /**
     * 获取错误码
     *
     * @return mixed
     */
    public function getErrCode()
    {
        return $this->errCode;
    }

    /**
     * 设置错误消息
     *
     * @param $errMsg
     * @return $this
     */
    public function setErrMsg($errMsg)
    {
        $this->errMsg = $errMsg;

        return $this;
    }

    /**
     * 获取错误消息
     *
     * @return mixed
     */
    public function getErrMsg()
    {
        return $this->errMsg;
    }

    /**
     * 设置数据
     *
     * @param array $data
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * 获取数据
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}