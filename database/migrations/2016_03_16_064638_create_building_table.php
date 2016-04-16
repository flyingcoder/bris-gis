<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purok_id')->unsigned();
            $table->string('name');
            $table->date('year_constructed');
            $table->integer('net_value');
            $table->string('building_usage');
            $table->string('structure');
            $table->double('area');
            $table->integer('no_stories');
            $table->string('holding');
            $table->double('longitude');
            $table->double('latitude');     

            $table->foreign('purok_id')->references('id')->on('puroks')->onDelete('cascade');
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
        Schema::drop('households');
    }
}
