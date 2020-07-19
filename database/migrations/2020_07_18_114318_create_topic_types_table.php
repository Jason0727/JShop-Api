<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTopicTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_types', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('name')->comment('名称');
            $table->tinyInteger('status')->default(0)->comment('状态 0 关闭 1 开启');
            $table->tinyInteger('sort')->comment('排序 正序');
            $table->timestamps();
            # 索引
            $table->index(['name']);
            $table->index(['status']);
            $table->index(['sort']);
        });
        # 表注释
        DB::statement('ALTER TABLE `topic_types` comment = "专题类型表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topic_types');
    }
}
