<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurokBoundaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purok_boundaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purok_id')->unsigned();

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
        Schema::drop('purok_boundaries');
    }
}
