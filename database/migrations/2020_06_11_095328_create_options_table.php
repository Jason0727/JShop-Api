<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('title', 50)->comment('标题（说明）');
            $table->string('key', 50)->comment('常量标识，必须大写');
            $table->json('value')->comment('常量值，必须json格式');
            # 索引
            $table->unique('key');
        });
        # 表注释
        DB::statement('ALTER TABLE `options` comment = "数据字典表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
