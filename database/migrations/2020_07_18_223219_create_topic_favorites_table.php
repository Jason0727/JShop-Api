<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTopicFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_favorites', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->integer('topic_id')->comment('外键，关联专题表ID');
            $table->integer('user_id')->comment('外键，关联用户表ID');
            $table->timestamps();
            # 索引
            $table->unique(['topic_id', 'user_id']);
        });
        # 表注释
        DB::statement('ALTER TABLE `topic_favorites` comment = "用户专题收藏表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topic_favorites');
    }
}
