<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coupons', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->integer('user_id')->comment('外键，用户表ID');
            $table->integer('coupon_id')->comment('外键，优惠券表ID');
            $table->integer('coupon_auto_send_id')->default(0)->comment('外键，优惠券自动发放表ID');
            $table->dateTime('begin_time')->comment('有效期开始时间');
            $table->dateTime('end_time')->comment('有效期截止时间');
            $table->tinyInteger('is_use', false, true)->default(0)->comment('是否已使用 0 否 1 是');
            $table->tinyInteger('type', false, true)->default(0)->comment('领取类型 0 平台发放 1 自动发放 2 领券中心领取');
            $table->integer('integral')->default(0)->comment('兑换支付积分数量');
            $table->timestamps();
            # 索引
            $table->index(['user_id']);
            $table->index(['coupon_id']);
            $table->index(['coupon_auto_send_id']);
            $table->index(['begin_time', 'end_time']);
            $table->index(['is_use']);
            $table->index(['type']);
        });
        # 表注释
        DB::statement('ALTER TABLE `user_coupons` comment = "用户优惠券表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_coupons');
    }
}
