<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdHeadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_heads', function (Blueprint $table) {
            $table->integer('building_id')->unsigned();
            $table->integer('resident_id')->unsigned();
            $table->string('contact_no');

            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');
            $table->foreign('resident_id')->references('id')->on('residents')->onDelete('cascade');
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
        Schema::drop('household_heads');
    }
}
