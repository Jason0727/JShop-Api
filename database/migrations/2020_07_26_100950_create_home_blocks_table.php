<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateHomeBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_blocks', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('name')->comment('名称');
            $table->tinyInteger('status')->default(0)->comment('状态 0 关闭 1 开启');
            $table->json('data')->comment('json数据，格式: [{"pic_url":"xxx","open_type":0,"link_url":"/page/index/index","appid":"xxxx"},{}]，open_type可能值：跳转类型，0 不跳转 1 内部小程序跳转 2 外部小程序跳转 3 h5跳转');
            $table->tinyInteger('style')->default(0)->comment('样式 0 默认 1 样式一 2 样式二');
            $table->timestamps();
            # 索引
            $table->index(['name']);
            $table->index(['status']);
        });
        # 表注释
        DB::statement('ALTER TABLE `home_blocks` comment = "图片魔方表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_blocks');
    }
}
