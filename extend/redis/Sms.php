<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-08-14
 * Time: 11:43
 */

namespace redis;


use App\Constant\RedisConstant;
use Carbon\Carbon;

class Sms
{
    /**
     * redis 实例
     *
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $redis;

    /**
     * redis 操作库
     *
     * @var int
     */
    protected $database = RedisConstant::DATABASE_15;

    /**
     * 当日相同手机号码最大短信发送次数
     *
     * @var
     */
    protected $maxSmsNum;

    /**
     * 当日相同IP地址最大短信发送次数
     *
     * @var
     */
    protected $maxIpNum;

    /**
     * 验证码有效时间
     *
     * @var
     */
    protected $codeTtl;

    /**
     * 有效期（今日截止时间戳 - 当前时间戳）
     *
     * @var
     */
    protected $expire;

    /**
     * CheckSms constructor.
     */
    public function __construct()
    {
        $this->redis = app('redis');

        $this->redis->select($this->database);

        $this->maxSmsNum = env('MAX_SMS_NUM');

        $this->maxIpNum = env('MAX_IP_NUM');

        $this->codeTtl = env('SMS_CODE_EXPIRE');

        $this->expire = Carbon::now()->endOfDay()->timestamp - Carbon::now()->timestamp;
    }

    /**
     * 手机发送次数校验
     *
     * @param string $phone
     * @return bool
     */
    public function checkMaxSmsNum(string $phone)
    {
        $sendNum = $this->redis->get($this->getMaxSmsNumCacheKey($phone)) ?: 0;

        return $sendNum >= $this->maxSmsNum;
    }

    /**
     * 校验手机发送次数缓存标识
     *
     * @param string $phone
     * @return string
     */
    private function getMaxSmsNumCacheKey(string $phone)
    {
        return RedisConstant::MAX_SMS_NUM . ":" . $phone;
    }

    /**
     * IP次数校验
     *
     * @return bool
     */
    public function checkMaxIpNum()
    {
        $ipNum = $this->redis->get($this->getMaxIpNumCacheKey()) ?: 0;

        return $ipNum >= $this->maxIpNum;
    }

    /**
     * 校验当日相同IP地址最大短信发送次数缓存标识
     *
     * @return string
     */
    private function getMaxIpNumCacheKey()
    {
        $ip = get_real_ip();

        return RedisConstant::MAX_SMS_NUM . ":" . $ip;
    }

    /**
     * 存储手机短信验证码
     *
     * @param string $phone
     * @param int $code
     */
    public function storeCode(string $phone, int $code)
    {
        $this->redis->set($this->getCodeCacheKey($phone), $code);

        $this->redis->expire($this->getCodeCacheKey($phone), $this->codeTtl);
    }

    /**
     * 手机短信验证码缓存标识
     *
     * @param string $phone
     * @return string
     */
    private function getCodeCacheKey(string $phone)
    {
        return RedisConstant::SMS_CODE . ":" . $phone;
    }

    /**
     * 发送次数自增
     *
     * @param string $phone
     */
    public function incrSendNum(string $phone)
    {
        $this->redis->incr($this->getMaxSmsNumCacheKey($phone));

        $this->redis->expire($this->getMaxSmsNumCacheKey($phone), $this->expire);
    }

    /**
     * ip次数自增
     */
    public function incrIpNum()
    {
        $this->redis->incr($this->getMaxIpNumCacheKey());

        $this->redis->expire($this->getMaxIpNumCacheKey(), $this->expire);
    }

    /**
     * 校验短信验证码
     *
     * @param string $phone
     * @param int $code
     * @return bool
     */
    public function checkCode(string $phone, int $code)
    {
        return $this->redis->get($this->getCodeCacheKey($phone)) == $code;
    }
}