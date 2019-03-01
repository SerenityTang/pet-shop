<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->string('id', 36)->index()->primary();

            $table->string('user_id', 36)->comment('用户id');
            $table->string('contact_name', 50)->comment('收件人姓名');
            $table->string('contact_phone', 20)->comment('收件人手机号');
            $table->string('province', 50)->comment('省');
            $table->string('city', 50)->comment('市');
            $table->string('district', 50)->comment('区/县');
            $table->string('town', 50)->comment('乡镇');
            $table->string('address')->comment('详细地址');
            $table->string('zip', 20)->nullable()->comment('邮政编码');
            $table->string('address_tag', 20)->nullable()->comment('地址标签');
            $table->boolean('default_address')->default(false)->comment('默认地址：0->否，1->是');
            $table->dateTime('last_used_at')->nullable()->comment('最后使用时间');

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
        Schema::dropIfExists('user_addresses');
    }
}
