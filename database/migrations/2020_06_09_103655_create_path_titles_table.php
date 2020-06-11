<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePathTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('path_titles', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('title', 30)->comment('标题');
            $table->string('page_url', 50)->comment('小程序路径');
        });
        # 表注释
        DB::statement('ALTER TABLE `path_titles` comment = "小程序页面标题"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('path_titles');
    }
}
