<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager', function (Blueprint $table) {
            $table->increments('id');//主键字段
            $table->string('username',20)->notNull();//1=男，2=女，3=保密
            $table->string('password')->notNull();
            $table->enum('gender',[1,2,3])->notNull()->default('1');
            $table->string('mobile',11);
            $table->string('email',40);
            $table->tinyInteger('role_id');
            $table->rememberToken();
            $table->enum('status',[1,2])->notNull()->default('2');//账号状态，1=禁用，2=启动，默认为2
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();//系统自己创建
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('manager');
    }
}
