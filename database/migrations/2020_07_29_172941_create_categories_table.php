<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('name')->comment('名称');
            $table->integer('parent_id')->default(0)->comment('父级ID');
            $table->string('pic_url')->nullable()->comment('分类图url');
            $table->string('pic_big_url')->nullable()->comment('分类大图url');
            $table->tinyInteger('status')->default(0)->comment('状态 0 关闭 1 开启');
            $table->tinyInteger('sort')->default(99)->comment('排序(正序)');
            $table->string('advert_pic_url')->nullable()->comment('广告图url');
            $table->string('advert_link_url')->nullable()->comment('广告跳转链接');
            $table->integer('level')->unsigned()->default(0)->comment('当前类目层级');
            $table->string('parent_path')->default('-')->comment('当前类目所有父类目id');
            $table->integer('platform_id')->comment('外键，关联平台表ID');
            $table->timestamps();
            # 索引
            $table->index(['platform_id', 'status']);
            $table->index(['sort', 'created_at']);
            $table->index(['parent_id']);
            $table->index(['level']);
        });
        # 表注释
        DB::statement('ALTER TABLE `categories` comment = "商品分类表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
