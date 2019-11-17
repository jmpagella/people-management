<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTelephonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_telephones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('people_id');
            $table->unsignedInteger('people_attribute_type_id')->nullable();
            $table->string('country_code')->nullable();
            $table->string('area_code')->nullable();
            $table->string('telephone');
            $table->timestamps();

            $table->foreign('people_id')->references('id')->on('people');
            $table->foreign('people_attribute_type_id')->references('id')->on('people_attribute_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_telephones');
    }
}
