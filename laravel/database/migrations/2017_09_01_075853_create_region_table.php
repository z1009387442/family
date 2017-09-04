<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region', function (Blueprint $table) {
            $table->increments('region_id');
            $table->string('region_name',30);
            $table->char('short',10);
            $table->integer('sort');
            $table->string('floating_value',30);
            $table->string('lng',30);
            $table->string('lat',30);
            $table->integer('add_time');
            $table->integer('update_time');

        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('region');
    }
}
