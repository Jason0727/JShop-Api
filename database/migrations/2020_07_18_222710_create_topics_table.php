<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('title')->comment('标题');
            $table->string('sub_title')->nullable()->comment('副标题');
            $table->string('tag_url')->nullable()->comment('标签图标url');
            $table->string('cover_url')->nullable()->comment('封面图');
            $table->string('share_url')->nullable()->comment('分享图');
            $table->integer('topic_type_id')->comment('外键，关联专题类型表ID');
            $table->longText('content')->comment('内容');
            $table->integer('read_count')->default(0)->comment('阅读量');
            $table->integer('virtual_read_count')->default(0)->comment('虚拟阅读量');
            $table->tinyInteger('sort')->unsigned()->default(0)->comment('排序 正序');
            $table->tinyInteger('layout')->unsigned()->default(0)->comment('布局  0 小图模式 1 大图模式');
            $table->tinyInteger('status')->unsigned()->default(0)->comment('状态  0 关闭 1 开启');
            $table->integer('agree_count')->unsigned()->default(0)->comment('点赞数');
            $table->integer('virtual_agree_count')->unsigned()->default(0)->comment('虚拟点赞数');
            $table->integer('virtual_favorite_count')->unsigned()->default(0)->comment('虚拟收藏数');
            $table->timestamps();
            # 虚拟字段
            $table->integer('read_count_total')->virtualAs("`read_count` + `virtual_read_count`")->comment('阅读量(总)');
            $table->integer('agree_count_total')->virtualAs("`agree_count` + `virtual_agree_count`")->comment('点赞数(总)');
            # 索引
            $table->index(['topic_type_id']);
            $table->index(['sort']);
            $table->index(['layout']);
        });
        # 表注释
        DB::statement('ALTER TABLE `topics` comment = "专题表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
}
