<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-08-07
 * Time: 15:46
 */

namespace traits;


use Tymon\JWTAuth\Facades\JWTAuth;

trait OauthUserTrait
{
    /**
     * 平台用户
     *
     * @var bool
     */
    protected $oauthUser;

    /**
     * 平台用户ID
     *
     * @var
     */
    protected $oauthUserId;

    /**
     * 用户ID
     *
     * @var
     */
    protected $userId;

    /**
     * openId
     *
     * @var
     */
    protected $openId;

    /**
     * OauthUserTrait constructor.
     */
    public function __construct()
    {
        $this->oauthUser = JWTAuth::getToken() && JWTAuth::check() ? JWTAuth::authenticate() : false;

        $this->oauthUserId = $this->oauthUser === false ? 0 : $this->oauthUser->id;

        $this->userId = $this->oauthUser === false ? 0 : $this->oauthUser->user_id;

        $this->openId = $this->oauthUser === false ? 0 : $this->oauthUser->open_id;
    }
}