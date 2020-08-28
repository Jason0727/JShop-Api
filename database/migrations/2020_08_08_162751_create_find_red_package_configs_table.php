<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFindRedPackageConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('find_red_package_configs', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->tinyInteger('user_num')->unsigned()->comment('拆红包所需用户数,最少2人');
            $table->decimal('total_money', 10, 2)->comment('红包总金额');
            $table->decimal('use_minimum', 10, 2)->comment('赠送的红包最低消费金额');
            $table->tinyInteger('expire_days')->default(30)->unsigned()->comment('红包有效期，单位:天');
            $table->tinyInteger('distribute_type')->unsigned()->default(0)->comment('红包分配类型 0 随机 1 平分');
            $table->tinyInteger('expire_hours')->unsigned()->default(2)->comment('红包有效期，单位:小时');
            $table->tinyInteger('status')->unsigned()->default(0)->comment('是否开启活动 0 否 1 是');
            $table->text('rule')->comment('规则');
            $table->string('share_title', 100)->comment('分享标题');
            $table->string('share_pic_url')->comment('分享图url');
            $table->timestamps();
            # 索引
            $table->index(['status', 'created_at']);
        });
        # 表注释
        DB::statement('ALTER TABLE `find_red_package_configs` comment = "裂变红包活动配置表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('find_red_package_configs');
    }
}
