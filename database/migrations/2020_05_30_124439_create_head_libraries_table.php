<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateHeadLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_libraries', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('head_url')->comment('头像Url');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('是否启用 0 禁用 1 启用');
            $table->tinyInteger('type')->unsigned()->default(0)->comment('类型 0 默认 1 卡通 2 吉祥物 3 动物');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            # 索引
            $table->index('status');
            $table->index('type');
        });
        # 表注释
        DB::statement('ALTER TABLE `head_libraries` comment = "头像库"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('head_libraries');
    }
}
