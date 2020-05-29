<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('nickname', 50)->comment('昵称');
            $table->string('avatar_url')->comment('头像Url');
            $table->tinyInteger('sex')->unsigned()->default(0)->comment('性别 0 保密 1 男 2 女');
            $table->string('phone', 20)->comment('手机号码');
            $table->string('email', 30)->nullable()->comment('邮箱');
            $table->decimal('money', 10, 2)->default(0)->comment('余额');
            $table->char('password', 32)->nullable()->comment('密码 md5(hash(原密码))');
            $table->tinyInteger('level')->unsigned()->default(1)->comment('会员等级');
            $table->integer('integral')->unsigned()->default(0)->comment('会员积分（升级后清零）');
            $table->integer('total_integral')->unsigned()->default(0)->comment('会员总积分（只增不减）');
            $table->string('comment')->default('')->comment('备注');
            $table->tinyInteger('is_blacklist')->unsigned()->default(0)->comment('是否黑名单 0 否 1 是');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();

            # 索引
            $table->unique('phone');
            $table->unique('email');
            $table->index('level');
            $table->index('created_at');
            $table->index(['phone', 'password']);
        });
        # 表注释
        DB::statement('ALTER TABLE `users` comment = "用户表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
