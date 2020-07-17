<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->tinyInteger('type')->comment("类型 1 首页");
            $table->text('content')->comment('内容');
            $table->tinyInteger('status')->comment('状态 0 关闭 1 开启');
            $table->timestamps();
            # 索引
            $table->index(['type', 'status']);
        });
        # 表注释
        DB::statement('ALTER TABLE `notices` comment = "通知表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notices');
    }
}
