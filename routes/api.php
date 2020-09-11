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
    # 微信静默登录
    Route::post('wx-login-with-silence', 'WxLoginWithSilenceController');
    # 微信手机号授权登录
    Route::post('wx-login-by-phone', 'WxLoginByPhoneController');
});

/**
 * ========================================================================
 * 通用 路由列表
 * ========================================================================
 */
Route::group(['prefix' => 'common', 'namespace' => 'Common'], function () {
    # 发送手机短信验证码
    Route::post('send-code', 'SendSmsCodeController');
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

# 发现红包
Route::group(['prefix' => 'find-red-package', 'namespace' => 'FindRedPackage', 'middleware' => 'auth.jwt'], function () {
    # 拆红包页面
    Route::get('show', 'ShowController');
    # 领取红包
    Route::post('open', 'OpenController');
    # 红包详情
    Route::get('detail', 'DetailController');
    # 好友助力帮拆红包
    Route::get('help', 'HelpController');
});

# 分类
Route::group(['prefix' => 'category', 'namespace' => 'Category'], function () {
    # 列表
    Route::get('index', 'IndexController');
});
