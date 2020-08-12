<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGoodAttrValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_attr_values', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->integer('attr_name_id')->comment('外键，商品规格属性名表');
            $table->string('value')->comment('属性值');
            $table->timestamps();
            # 索引
            $table->unique(['attr_name_id', 'value']);
        });
        # 表注释
        DB::statement('ALTER TABLE `good_attr_values` comment = "商品规格属性值表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_attr_values');
    }
}
