<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSmsPhoneWhiteListsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_phone_white_lists', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('phone')->comment('手机号');
            $table->string('reason')->nullable()->comment('原因');
            $table->timestamps();
            # 索引
            $table->unique(['phone']);
        });
        # 表注释
        DB::statement('ALTER TABLE `sms_phone_white_lists` COMMENT "手机白名单"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_phone_white_lists');
    }
}
