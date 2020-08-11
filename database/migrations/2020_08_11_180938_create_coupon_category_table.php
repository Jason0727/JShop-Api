<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCouponCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_category', function (Blueprint $table) {
            # 字段
            $table->integer('coupon_id')->comment('外键，优惠券ID');
            $table->integer('category_id')->comment('外键，商品分类ID');
            # 索引
            $table->index(['coupon_id']);
            $table->index(['category_id']);
            $table->unique(['coupon_id', 'category_id']);
        });
        # 表注释
        DB::statement('ALTER TABLE `coupon_category` comment = "优惠券-商品分类关联表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon_category');
    }
}
