<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('username', 50)->unique()->comment('用户名');
            $table->string('email', 50)->unique()->comment('邮箱地址');
            $table->string('mobile', 20)->unique()->nullable()->comment('电话号码');
            $table->string('password')->comment('密码');
            $table->rememberToken();

            $table->string('nick_name', 50)->nullable()->comment('昵称');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('realname', 50)->nullable()->comment('真实姓名');
            $table->tinyInteger('gender')->nullable()->comment('性别：0->男，1->女');
            $table->date('birth')->nullable()->comment('出生日期');
            $table->string('province', 50)->nullable()->comment('省');
            $table->string('city', 50)->nullable()->comment('市');
            $table->string('district', 50)->nullable()->comment('区');
            $table->string('address')->nullable()->comment('详细地址');

            $table->string('personal_domain', 20)->nullable()->unique()->comment('个性域名');
            $table->string('personal_website', 50)->nullable()->comment('个人网站');
            $table->text('personal_intro')->nullable()->comment('个人简介');
            $table->string('qq_name', 50)->nullable()->comment('QQ名');
            $table->string('qq', 20)->nullable()->comment('QQ号码');
            $table->string('wechat_name', 50)->nullable()->comment('微信名');
            $table->string('wechat', 50)->nullable()->comment('微信号');
            $table->string('wechat_qrcode')->nullable()->comment('微信二维码');
            $table->string('wechat_openid')->nullable();
            $table->string('wechat_unionid')->nullable();
            $table->string('weibo_name', 50)->nullable()->comment('微博名');
            $table->string('weibo_link')->nullable()->comment('微博链接');
            $table->string('github_name', 50)->nullable()->comment('github名');
            $table->string('github_link')->nullable()->comment('github链接');
            $table->tinyInteger('profession_status')->nullable()->comment('职业状态：0->学生，1->在职，2->待业');
            $table->string('profession', 50)->nullable()->comment('职业');

            $table->boolean('applied_notifications')->default(true)->comment('问答被回复：0->关闭，1->开启');
            $table->boolean('commented_notifications')->default(true)->comment('博客被评论：0->关闭，1->开启');
            $table->boolean('attentioned_notifications')->default(true)->comment('被用户关注：0->关闭，1->开启');
            $table->boolean('email_notifications')->default(true)->comment('邮件通知策略：0->关闭，1->开启');

            $table->boolean('user_status')->default(false)->comment('用户状态：0->禁用，1->正常');
            $table->tinyInteger('user_identity')->default(0)->comment('用户身份：0->普通用户，1->运营，2->管理员');
            $table->dateTime('approval_time')->nullable()->comment('实名认证时间');
            $table->tinyInteger('approval_status')->default(0)->comment('实名认证状态：0->未提交资料，1->待审核，2->审核通过');
            $table->boolean('email_verified')->default(false)->comment('邮箱认证状态：0->未认证，1->已认证');
            $table->boolean('mobile_verified')->default(false)->comment('手机认证状态：0->未认证，1->已认证');
            $table->tinyInteger('expert_status')->default(0)->comment('达人认证状态：0->未提交资料，1->待审核，2->审核通过');

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
        Schema::dropIfExists('users');
    }
}
