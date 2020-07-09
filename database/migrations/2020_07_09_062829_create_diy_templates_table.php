<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDiyTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diy_templates', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('name', 50)->comment('模板名称');
            $table->tinyInteger('status')->unsigned()->default(0)->comment('状态: 0 禁用 1 启用');
            $table->json('config')->comment('模板配置数据，格式:json');
            $table->timestamps();
            # 索引
            $table->index(['name']);
            $table->index(['status']);
        });
        # 表注释
        DB::statement('ALTER TABLE `diy_templates` comment = "Diy模板表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diy_templates');
    }
}
