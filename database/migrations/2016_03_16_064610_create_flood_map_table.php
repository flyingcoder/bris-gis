<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFloodMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flood_maps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barangay_id')->unsigned();
            $table->integer('level');
            $table->integer('return_period');

            $table->foreign('barangay_id')->references('id')->on('barangays')->onDelete('cascade');
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
        Schema::drop('barangays');
    }
}
