<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCouponAutoSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_auto_sends', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->integer('coupon_id')->comment('外键，优惠券表ID');
            $table->tinyInteger('event', false, true)->comment('触发事件 1 分享 2 购买并付款');
            $table->integer('total_times')->default(0)->comment('可发放总次数 0 不限制');
            $table->integer('send_times')->default(0)->comment('已发放总次数');
            $table->softDeletes();
            $table->timestamps();
            # 索引
            $table->unique(['coupon_id']);
            $table->index(['event']);
            $table->index(['deleted_at']);
            $table->index(['total_times']);
            $table->index(['send_times']);
        });
        # 表注释
        DB::statement('ALTER TABLE `coupon_auto_sends` comment = "优惠券自动发放表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon_auto_sends');
    }
}
