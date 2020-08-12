<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGoodAttrNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_attr_names', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->integer('good_id')->comment('外键，商品表ID');
            $table->string('name', 20)->comment('属性名称');
            $table->timestamps();
            # 索引
            $table->unique(['good_id', 'name']);
        });
        # 表注释
        DB::statement('ALTER TABLE `good_attr_names` comment = "商品规格属性名表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_attr_names');
    }
}
