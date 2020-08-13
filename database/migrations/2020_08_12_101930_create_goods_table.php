<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('name', 100)->comment('商品名称');
            $table->string('cover_pic_url')->comment('商品缩略图url');
            $table->string('video_url')->comment('商品视频url');
            $table->tinyInteger('category_id')->default(0)->comment('外键，分类表ID');
            $table->integer('merchant_id')->default(0)->comment('外键，商家表ID');
            $table->integer('sku_id')->default(0)->comment('外键，规格表ID');
            $table->tinyInteger('type')->default(0)->comment('类型 0 普通商品 1 砍价商品');
            $table->decimal('price', 10, 2)->default(0.00)->comment('售价（SKU最低价）');
            $table->decimal('original_price', 10, 2)->default(0.00)->comment('原价（仅做展示）');
            $table->tinyInteger('status')->default(0)->comment('状态 0 下架 1 上架');
            $table->integer('total_stock')->default(0)->comment('商品总库存（SKU库存之和）');
            $table->integer('total_sales')->default(0)->comment('销量（SKU销量之和）');
            $table->integer('virtual_sales')->default(0)->comment('虚拟销量');
            $table->decimal('weight', 10, 2)->default(0.00)->comment('重量，单位:kg');
            $table->tinyInteger('is_hot')->default(0)->comment('是否加入热销 0 否 1 是');
            $table->tinyInteger('is_member_discount')->default(0)->comment('是否参与会员折扣 0 不参与 1 参与');
            $table->integer('freight_template_id')->comment(0)->comment('外键，关联运费模板表ID');
            $table->json('service')->nullable()->comment('商品服务选项');
            $table->text('detail')->nullable()->comment('商品详情（图文）');
            $table->tinyInteger('sort')->default(99)->comment('排序 正序');
            $table->tinyInteger('merchant_sort')->default(99)->comment('排序（商户） 正序');
            $table->string('unit', 10)->default('件')->comment('单位');
            $table->json('full_cut')->nullable()->comment('满减包邮，格式:{"pieces":"1","forehead":"100"}，前者满件包邮，后者满额包邮');
            $table->integer('integral')->default(0)->comment('赠送积分数量');
            $table->tinyInteger('is_quick_purchase')->default(0)->comment('是否加入快速购买（砍价商品专用） 0 否 1 是');
            $table->integer('confine_count')->default(0)->comment('购买数量限制 0 不限制');
            $table->timestamps();
            $table->softDeletes();
            # 索引
            $table->index(['name']);
            $table->index(['category_id']);
            $table->index(['merchant_id']);
            $table->index(['sku_id']);
            $table->index(['type']);
            $table->index(['status']);
            $table->index(['is_hot']);
            $table->index(['is_member_discount']);
            $table->index(['freight_template_id']);
            $table->index(['sort', 'created_at']);
            $table->index(['merchant_sort', 'created_at']);
            $table->index(['is_quick_purchase']);
        });
        # 表注释
        DB::statement('ALTER TABLE `goods` comment = "商品表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
