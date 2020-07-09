<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/**
 * ========================================================================
 * 登录 路由列表
 * ========================================================================
 */
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    # 微信登录
    Route::post('wx', 'WxController@login');
    # 短信登录(暂未使用)
    Route::post('sms', 'SmsController@login');
    # 密码登录(暂未使用)
    Route::post('password', 'PasswordController@login');
    # 支付宝登录(暂未使用)
    Route::post('alipay', 'AlipayController@login');
    # 发送短信验证码
    Route::post('send/code', 'SmsController@sendCode');
});

/**
 * ========================================================================
 * OSS 路由列表
 * ========================================================================
 */
//Route::group(['middleware' => 'auth.jwt'], function () {
    # oss文件上传
    Route::group(['prefix' => 'oss', 'namespace' => 'Oss'], function () {
        # 通用文件上传
        Route::post('upload', 'UploadController');
    });
//});

/**
 * ========================================================================
 * 商城 路由列表
 * ========================================================================
 */
Route::group(['prefix' => 'store', 'namespace' => 'Store'], function () {
    # 基本信息
    Route::group(['prefix' => 'base', 'namespace' => 'Base'], function () {
        # 商城配置
        Route::get('config', 'ConfigController');
        # 底部导航栏配置
        Route::get('bottom-nav-bar', 'BottomNavBarController');
        # 顶部导航栏配置
        Route::get('top-nav-bar', 'TopNavBarController');
    });
    # 首页
    Route::group(['prefix' => 'home', 'namespace' => 'Home'], function () {
        # 首页
        Route::get('index', 'IndexController');
    });
});
