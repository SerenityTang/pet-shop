<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_records', function (Blueprint $table) {
            $table->string('id', 36)->index()->primary();

            $table->string('user_id', 36)->comment('用户id');
            $table->string('code')->comment('验证链接code');
            $table->boolean('status')->default(true)->comment('使用状态：0->已使用，1->未使用');
            $table->string('url')->comment('激活邮件页面地址');
            $table->string('remarks')->comment('邮件作用对象，如：忘记密码、邮箱验证、账号激活……');
            $table->timestamp('activated_at')->nullable()->comment('激活时间');
            $table->timestamp('expired_at')->comment('过期时间');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_records');
    }
}
