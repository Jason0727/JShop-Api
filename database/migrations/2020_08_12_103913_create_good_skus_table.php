<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGoodSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_skus', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('name')->comment('名称');
            $table->integer('good_id')->comment('外键，商品表ID');
            $table->integer('stock')->default(0)->comment('库存');
            $table->decimal('price', 10, 2)->default(0.00)->comment('售价');
            $table->decimal('cost_price', 10, 2)->default(0.00)->comment('成本价');
            $table->string('pic_url')->comment('规格图url');
            $table->json('attr')->comment('规格属性，格式:[{"attr_id":1,"attr_name":"红色"},{"attr_id":2,"attr_name":"XL"}]');
            $table->timestamps();
            # 索引
            $table->index(['good_id']);
        });
        # 表注释
        DB::statement('ALTER TABLE `good_skus` comment = "商品规格sku表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_skus');
    }
}
