<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGoodPlatformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_platform', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->integer('good_id')->comment('外键，商品表ID');
            $table->integer('platform_id')->comment('外键，平台表ID');
            # 索引
            $table->unique(['good_id', 'platform_id']);
        });
        # 表注释
        DB::statement('ALTER TABLE `good_platform` COMMENT "商品-平台关联表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_platform');
    }
}
