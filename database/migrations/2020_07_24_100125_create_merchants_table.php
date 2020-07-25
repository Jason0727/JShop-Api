<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('name')->comment('店铺名称');
            $table->string('logo_url')->comment('店铺Logo url');
            $table->string('head_bg_url')->comment('店铺头部背景图url');
            $table->integer('user_id')->comment('外键，关联用户表ID');
            $table->string('real_name')->comment('真实姓名');
            $table->string('tel')->comment('联系电话');
            $table->string('service_tel')->comment('客服电话');
            $table->tinyInteger('is_open')->default(0)->comment('是否营业 0 否 1 是');
            $table->tinyInteger('is_lock')->default(0)->comment('是否系统关闭 0 否 1 是');
            $table->tinyInteger('review_status')->default(0)->comment('审核状态 0 待审核 1 审核通过 2 审核不通过');
            $table->text('review_result')->nullable()->comment('审核结果');
            $table->dateTime('review_time')->nullable()->comment('审核时间');
            $table->integer('province_code')->comment('省Code');
            $table->integer('city_code')->comment('市Code');
            $table->integer('district_code')->comment('区Code');
            $table->string('address')->comment('详细地址');
            $table->integer('mch_common_cat_id')->comment('所售类目');
            $table->text('main_content')->comment('主营范围');
            $table->text('summary')->nullable()->comment('摘要/简介');
            $table->integer('transfer_rate')->unsigned()->default(0)->comment('商户手续费，千分之N');
            $table->decimal('account_money', 10, 2)->default(0.00)->comment('商户余额');
            $table->tinyInteger('sort')->default(99)->comment('排序');
            $table->tinyInteger('is_recommend')->default(0)->comment('是否推荐 0 否 1 是');
            $table->string('longitude')->nullable()->comment('经度');
            $table->string('latitude')->nullable()->comment('纬度');
            $table->string('we_chat')->nullable()->comment('微信号');
            $table->string('qq')->nullable()->comment('QQ');
            $table->string('email')->nullable()->comment('邮箱');
            $table->integer('platform_id')->comment('外键，关联平台表ID');
            $table->timestamps();
            # 索引
            $table->index(['is_open', 'is_lock', 'review_status']);
            $table->index(['province_code']);
            $table->index(['city_code']);
            $table->index(['district_code']);
            $table->index(['mch_common_cat_id']);
            $table->index(['sort']);
            $table->index(['is_recommend']);
            $table->index(['platform_id']);
        });
        # 表注释
        DB::statement('ALTER TABLE `merchants` comment = "商户表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchants');
    }
}
