<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFissionRedPackageRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fission_red_package_records', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->integer('user_id')->comment('外键，用户ID');
            $table->integer('parent_id')->default(0)->comment('父级用户ID');
            $table->tinyInteger('user_num')->unsigned()->default(2)->comment('拆红包所需用户数，最少2人');
            $table->decimal('total_money', 10, 2)->default('0.00')->comment('红包总金额');
            $table->decimal('money', 10, 2)->default('0.00')->comment('分到红包金额');
            $table->decimal('use_minimum', 10, 2)->default('0.00')->comment('红包使用最低消费金额');
            $table->integer('expire')->default(30)->comment('红包有效期，单位:天');
            $table->tinyInteger('distribute_type')->unsigned()->default(0)->comment('红包分配类型 0 随机 1 平分');
            $table->tinyInteger('is_expire')->unsigned()->default(0)->comment('是否已过期 0 未过期 1 已过期');
            $table->tinyInteger('is_finish')->unsigned()->default(0)->comment('是否已完成 0 未完成 1 已完成');
            $table->dateTime('finish_time')->nullable()->comment('完成时间');
            $table->timestamps();
            # 索引
            $table->index(['user_id']);
            $table->index(['is_expire']);
            $table->index(['is_finish']);
            $table->index(['created_at']);
        });
        # 表注释
        DB::statement('ALTER TABLE `fission_red_package_records` comment = "裂变红包用户参与记录表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fission_red_package_records');
    }
}
