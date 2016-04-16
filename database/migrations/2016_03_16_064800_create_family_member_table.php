<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_members', function (Blueprint $table) {
            $table->integer('family_id')->unsigned();
            $table->integer('resident_id')->unsigned();
            $table->string('relation_head');

            $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');
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
        Schema::drop('family_members');
    }
}
