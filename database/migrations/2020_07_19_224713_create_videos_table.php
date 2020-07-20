<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('title')->comment('标题');
            $table->integer('platform_id')->comment('外键，关联平台表ID');
            $table->string('video_url')->comment('视频url');
            $table->tinyInteger('status')->default(0)->comment('状态 0 关闭 1 开启');
            $table->tinyInteger('sort')->default(0)->comment('排序 正序');
            $table->string('cover_url')->comment('封面图');
            $table->text('content')->nullable()->comment('详情介绍');
            $table->timestamps();
            #索引
            $table->index(['title']);
            $table->index(['platform_id', 'status']);
            $table->index(['status', 'sort', 'created_at']);
        });
        # 表注释
        DB::statement('ALTER TABLE `videos` comment = "视频表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
