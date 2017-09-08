<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('join', function (Blueprint $table) {
            $table->increments('join_id');
            $table->char('join_people_name', 30)->comment('加盟人姓名');
            $table->char('join_people_phone', 20)->comment('加盟人手机');
            $table->char('join_people_sex', 10)->comment('加盟人性别');
            $table->integer('join_people_age')->comment('加盟人年龄');
            $table->char('join_people_fax', 20)->comment('加盟人传真');
            $table->string('join_people_tel', 20)->comment('加盟人电话');
            $table->string('join_people_email', 20)->comment('加盟人邮箱');
            $table->char('join_people_business', 10)->comment('加盟人行业');
            $table->string('join_people_address', 50)->comment('加盟人地址');
            $table->string('hotel_city_name', 20)->comment('开店城市');
            $table->string('corporation', 20)->comment('合作意向');
            $table->integer('area')->comment('面积');
            $table->char('tenement',15)->comment('是否有物业');
            $table->string('tenement_address',80)->comment('物业地址');
            $table->string('property', 50)->comment('产权情况');
            $table->string('others', 50)->comment('其他');
            $table->tinyInteger('status')->default('0')->comment('查看状态 0未查看');
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('join');
    }
}
