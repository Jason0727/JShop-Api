<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platforms', function (Blueprint $table) {
            # 字段
            $table->id();
            $table->string('name', 30)->comment('应用名称');
            $table->string('icon',255)->comment('图标');
            $table->string('app_id')->comment('appId');
            $table->string('app_secret')->comment('appSecret（支付宝不存在）');
            $table->enum('oauth', ['weixinsmall', 'alipaysmall'])->comment('平台标识: weixinsmall 微信小程序 alipaysmall 支付宝小程序');
            $table->tinyInteger('status')->default(0)->comment('是否启用 0 未启用 1 已启用');
            $table->string('aes_key',255)->nullable()->comment('ase密钥（支付宝专用）');
            $table->text('rsa_public_key')->nullable()->comment('公钥（支付宝专用）');
            $table->text('rsa_private_key')->nullable()->comment('私钥（支付宝专用）');
            $table->text('app_cert_public_key')->nullable()->comment('公钥证书key（支付宝专用）');
            $table->text('root_cert')->nullable()->comment('公证书（支付宝专用）');
            $table->string('mch_id',50)->nullable()->comment('商户号（微信专用）');
            $table->string('pay_secret',50)->nullable()->comment('支付密钥（微信专用）');
            $table->timestamps();
            # 索引
            $table->index('oauth');
            $table->index('app_id');
            $table->index('status');
        });
        # 表注释
        DB::statement('ALTER TABLE `platforms` comment = "平台表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platforms');
    }
}
