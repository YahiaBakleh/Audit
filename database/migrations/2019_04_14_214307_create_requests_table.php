<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('career_id');
            $table->string('first_name');
            $table->string('father_name');
            $table->string('family_name');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('email');
            $table->string('marital_status');
            $table->string('military_service');
            $table->string('country');
            $table->string('street_address');
            $table->string('phone_home');
            $table->string('phone_mobile');
            $table->string('cv_path');
            $table->foreign('career_id')->references('id')->on('sections');
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
        Schema::dropIfExists('requests');
    }
}
