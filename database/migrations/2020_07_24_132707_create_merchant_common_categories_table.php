<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMerchantCommonCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_common_categories', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('name')->comment('名称');
            $table->tinyInteger('status')->comment('状态 0 关闭 1 开启');
            $table->tinyInteger('sort')->default(99)->comment('排序 正序');
            $table->timestamps();
            # 索引
            $table->index(['sort']);
        });
        # 表注释
        DB::statement('ALTER TABLE `merchant_common_categories` comment = "商户入驻类目表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_common_categories');
    }
}
