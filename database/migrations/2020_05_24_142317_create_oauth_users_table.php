<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateOauthUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_users', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->integer('user_id')->default(0)->comment('外键，用户ID');
            $table->string('open_id', 50)->comment('用户openid');
            $table->integer('platform_id')->default(0)->comment('外键，平台ID');
            $table->string('union_id', 50)->comment('用户unionid，微信用户全局标识');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();

            # 索引
            $table->index('user_id');
            $table->index('platform_id');
            $table->index('open_id');
            $table->unique(['user_id', 'open_id', 'platform_id']);
        });

        # 表注释
        DB::statement('ALTER TABLE `oauth_users` comment = "用户Oauth信息表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oauth_users');
    }
}
