<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-08-14
 * Time: 10:25
 */

namespace redis;


use App\Constant\RedisConstant;

class LoginAccessToken
{
    /**
     * redis 实例
     *
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $redis;

    /**
     * 平台 实例
     *
     * @var
     */
    protected $platform;

    /**
     * redis 操作库
     *
     * @var int
     */
    protected $database = RedisConstant::DATABASE_0;

    /**
     * 平台用户ID
     *
     * @var
     */
    protected $oauthUserId;

    /**
     * 缓存标识
     *
     * @var
     */
    protected $cacheKey;

    /**
     * 有效期
     *
     * @var
     */
    protected $ttl;

    /**
     * LoginAccessToken constructor.
     * @param int $oauthUserId
     */
    public function __construct(int $oauthUserId)
    {
        $this->oauthUserId = $oauthUserId;

        $this->platform = app('platform');

        $this->redis = app('redis');

        $this->redis->select($this->database);

        $this->cacheKey = RedisConstant::ACCESS_TOKEN . ":" . $this->platform->id . ":" . $this->oauthUserId;

        $this->ttl = env('JWT_TTL');
    }

    /**
     * 获取AccessToken
     *
     * @return mixed
     */
    public function get()
    {
        return $this->redis->get($this->cacheKey);
    }

    /**
     * @param string $accessToken
     */
    public function set(string $accessToken)
    {
        $this->redis->set($this->cacheKey, $accessToken);

        $this->redis->expire($this->cacheKey, $this->ttl);
    }
}