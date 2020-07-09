<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('title')->comment('标题');
            $table->string('pic_url')->comment('图片地址url');
            $table->integer('platform_id')->unsigned()->default(0)->comment('外键，关联平台表ID');
            $table->tinyInteger('sort')->unsigned()->default(0)->comment('排序，规则:越小越靠前');
            $table->tinyInteger('type')->unsigned()->default(0)->comment('类型，0 导航轮播 1 广告位');
            $table->tinyInteger('open_type')->unsigned()->default(0)->comment('跳转类型，0 不跳转 1 内部小程序跳转 2 外部小程序跳转 3 h5跳转');
            $table->string('link_url')->nullable()->comment('跳转地址，当open_type = 1或2或3时，必填');
            $table->string('appid')->nullable()->comment('小程序appid，当open_type = 2时，必填');
            $table->softDeletes();
            $table->timestamps();
            # 索引
        });
        # 表注释
        DB::statement('ALTER TABLE `banners` comment = "导航轮播（广告位）表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
