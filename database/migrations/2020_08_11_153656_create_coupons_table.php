<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('name', 80)->comment('优惠券名称');
            $table->string('pic_url')->comment('优惠券图片url');
            $table->tinyInteger('discount_type', false, true)->default(1)->comment('优惠券类型 1 折扣券 2 满减券');
            $table->decimal('min_price', 10, 2)->default(0.00)->comment('最低消费金额');
            $table->decimal('sub_price', 10, 2)->default(0.00)->comment('优惠金额');
            $table->tinyInteger('discount', false, true)->default(100)->comment('折扣率，百分比格式:95');
            $table->dateTime('begin_time')->comment('有效期开始时间');
            $table->dateTime('end_time')->comment('有效期截止时间');
            $table->integer('total_count')->default(0)->comment('发放总数量');
            $table->tinyInteger('is_join', false, true)->default(0)->comment('是否加入领券中心 0 否 1 是');
            $table->tinyInteger('sort', false, true)->default(99)->comment('排序 正序');
            $table->tinyInteger('appoint_type', false, true)->default(0)->comment('指定适用范围 0 全场通用 1 指定分类 2 指定商品');
            $table->tinyInteger('is_integral', false, true)->default(0)->comment('是否加入积分商城 0 否 1 是');
            $table->integer('integral')->default(0)->comment('兑换需要积分数量，is_integral = 1时 有效');
            $table->integer('total_num')->default(0)->comment('积分商城发放数量，is_integral = 1时 有效');
            $table->tinyInteger('user_num', false, true)->default(0)->comment('每人限制兑换次数，is_integral = 1时 有效');
            $table->integer('except_integral_total_num')->virtualAs('`total_count` - `total_num`')->comment('虚拟字段，非积分商城可发放数量，is_integral = 1时 有效');
            $table->string('rule', 1000)->nullable()->comment('适用说明');
            $table->text('desc')->nullable()->comment('描述');
            $table->softDeletes();
            $table->timestamps();
            # 索引
            $table->index(['discount_type']);
            $table->index(['begin_time', 'end_time']);
            $table->index(['is_join']);
            $table->index(['appoint_type']);
            $table->index(['is_integral']);
            $table->index(['except_integral_total_num']);
        });
        # 表注释
        DB::statement('ALTER TABLE `coupons` comment = "优惠券表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
