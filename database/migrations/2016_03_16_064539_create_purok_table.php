<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puroks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barangay_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('president');
            $table->integer('population');



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
        Schema::drop('puroks');
    }
}
