<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Strategies\OrderStrategy;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        # 短信容器注入
        $this->app->singleton(EasySms::class, function () {
            # 配置
            $config = [
                'timeout' => 5.0, # HTTP 请求的超时时间（秒）
                # 默认发送配置
                'default' => [
                    # 网关调用策略，默认：顺序调用
                    'strategy' => OrderStrategy::class,
                    # 默认可用的发送网关
                    'gateways' => ['aliyun']
                ],
                # 可用的网关配置
                'gateways' => [
                    'errorlog' => [
                        'file' => ''
                    ],
                    # 阿里云
                    'aliyun' => [
                        'access_key_id' => env('OSS_ACCESS_KEY'),
                        'access_key_secret' => env('OSS_SECRET_KEY'),
                        'sign_name' => '小周之家',
                    ],
                ],
            ];
            return new EasySms($config);
        });

        # http容器注入
        $this->app->singleton(Client::class, function ($app, array $config) {
            return new Client($config);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        # 扩展手机号码校验
        Validator::extend('mobile', function ($attribute, $value, $parameters, $validator) {
            return preg_match("/^1[0-9]{10}$/", $value) === 1;
        });
    }
}
