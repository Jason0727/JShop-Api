<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHomeNavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_navs', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('name')->comment('图标名称');
            $table->string('pic_url')->comment('图片地址url');
            $table->integer('platform_id')->unsigned()->default(0)->comment('外键，关联平台表ID');
            $table->tinyInteger('sort')->unsigned()->default(0)->comment('排序，规则:越小越靠前');
            $table->tinyInteger('status')->unsigned()->default(0)->comment('状态，0 禁用 1 启用');
            $table->tinyInteger('open_type')->unsigned()->default(1)->comment('跳转类型，0 不跳转 1 内部小程序跳转 2 外部小程序跳转 3 h5跳转');
            $table->string('link_url')->nullable()->comment('跳转地址，当open_type = 1或2或3时，必填');
            $table->string('appid')->nullable()->comment('小程序appid，当open_type = 2时，必填');
            $table->timestamps();
            # 索引
        });
        # 表注释
        DB::statement('ALTER TABLE `home_navs` comment = "首页导航表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_navs');
    }
}
