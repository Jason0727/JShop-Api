<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\District;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('citycode', 10)->nullable()->comment('城市编码');
            $table->string('adcode', 10)->comment('区域编码');
            $table->string('name', 30)->comment('行政区名称');
            $table->string('center', 30)->comment('城市中心点（经纬度）');
            $table->enum('level', [District::COUNTRY, District::PROVINCE, District::CITY, District::DISTRICT])->comment('行政区划级别');
            $table->string('parent_adcode', 10)->default(0)->comment('父级区域编码');

            # 索引
            $table->index('adcode');
            $table->index('parent_adcode');
        });
        # 表注释
        DB::statement('ALTER TABLE `districts` comment = "地区表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
