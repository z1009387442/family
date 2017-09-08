<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplexFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('complex_facilities', function (Blueprint $table) {
            $table->increments('complex_facilities_id');
            $table->string('complex_facilities_name',60)->comment('综合设施名称');
            $table->tinyInteger('status')->default('1')->comment('排序');
            $table->Integer('sort')->comment('排序');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('complex_facilities');
    }
}
