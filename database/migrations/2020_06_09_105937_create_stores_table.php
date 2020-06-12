<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('name', 50)->comment('商城名称');
            $table->string('logo')->comment('商城Logo');
            $table->string('contact_tel', 30)->comment('联系电话（支持手机和电话）');
            $table->tinyInteger('show_customer_service')->unsigned()->comment('是否显示在线客服 0 否 1 是');
            $table->integer('delivery_time')->unsigned()->default(0)->comment('收货时间（从发货到自动确认收货的时间），单位：天');
            $table->integer('after_sale_time')->unsigned()->default(0)->comment('售后时间（可以申请售后的时间），单位：天');
            $table->tinyInteger('cat_style')->unsigned()->default(1)->comment('页面分类样式 1 大图模式（不显示侧栏） 2 大图模式（显示侧栏） 3 小图标模式（不显示侧栏） 4 小图标模式（显示侧栏）5 商品列表模式');
            $table->tinyInteger('cat_goods_cols')->unsigned()->default(3)->comment('首页分类商品行数');
            $table->tinyInteger('cat_goods_count')->unsigned()->default(3)->comment('首页分类商品每行个数');
            $table->string('address')->default('')->comment('商城总部位置');
            $table->tinyInteger('over_half_hour')->unsigned()->default(0)->comment('未支付订单超时时间（0 表示不自动取消未支付订单），单位：半小时');
            $table->tinyInteger('is_offline')->unsigned()->default(0)->comment('是否开启自提 0 否 1 是');
            $table->tinyInteger('is_coupon')->unsigned()->default(0)->comment('是否开启优惠券 0 否 1 是');
            $table->tinyInteger('send_type')->unsigned()->default(1)->comment('发货方式 0 快递或自提 1 仅快递 2 仅自提');
            $table->tinyInteger('nav_count')->unsigned()->default(0)->comment('首页导航栏每行显示数 0 4个 1 5个');
            $table->tinyInteger('integral')->unsigned()->default(10)->comment('1元抵扣积分数');
            $table->text('integration')->nullable()->comment('会员积分使用规则');
            $table->tinyInteger('dial')->unsigned()->default(0)->comment('一键拨号 0 关闭 1 开启');
            $table->string('dial_pic')->default('')->comment('拨号图标，当dial = 1时有效');
            $table->tinyInteger('cut_thread')->unsigned()->default(0)->comment('分类分割线 0 关闭 1 开启');
            $table->tinyInteger('is_recommend')->unsigned()->default(0)->comment('推荐商品状态 0 关闭 1 开启');
            $table->tinyInteger('recommend_count')->unsigned()->default(0)->comment('推荐商品数量，is_recommend = 1时有效');
            $table->tinyInteger('status')->unsigned()->default(0)->comment('禁用状态 0 未禁用 1 已禁用');
            $table->tinyInteger('is_comment')->unsigned()->default(0)->comment('商城评论状态 0 关闭 1 开启');
            $table->tinyInteger('is_sales')->unsigned()->default(0)->comment('商品销量状态 0 关闭 1 开启');
            $table->tinyInteger('is_member_price')->unsigned()->default(0)->comment('是否显示会员价 0 关闭 1 开启');
            # 索引
        });
        # 表注释
        DB::statement('ALTER TABLE `stores` comment = "商城表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
