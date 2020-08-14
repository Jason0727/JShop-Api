<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-08-07
 * Time: 15:46
 */

namespace traits;


use Illuminate\Support\Facades\Auth;

trait OauthUserTrait
{
    /**
     * 平台用户
     *
     * @return bool|\Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function oauthUser()
    {
        return Auth::check() === false || !Auth::user() ? false : Auth::user();
    }

    /**
     * 平台用户ID
     *
     * @return int
     */
    public function oauthUserId()
    {
        return Auth::id() ?: 0;
    }

    /**
     * 用户ID
     *
     * @return int
     */
    public function userId()
    {
        return $this->oauthUser() === false ? 0 : $this->oauthUser()->user_id;
    }

    /**
     * 平台用户openid
     *
     * @return int
     */
    public function openId()
    {
        return $this->oauthUser() === false ? 0 : $this->oauthUser()->open_id;
    }
}