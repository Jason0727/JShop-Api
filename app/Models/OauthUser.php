<?php


namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use traits\SerializeDateTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;

class OauthUser extends Authenticatable implements JWTSubject
{
    use SerializeDateTrait;

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

    /**
     * 设置用户unionId
     *
     * @param $unionId
     * @return $this
     */
    public function setUnionId($unionId)
    {
        $this->union_id = $unionId;
        $this->save();

        return $this;
    }

    /**
     * 关联用户模型
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}