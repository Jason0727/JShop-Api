<?php


namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class OauthUser extends Authenticatable implements JWTSubject
{
    /**
     * 合法字段
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'open_id',
        'platform_id',
        'union_id'
    ];

    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}