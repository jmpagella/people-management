<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleManagementTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // People Categories
        Schema::create('people_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        // People
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // People - People Categories
        Schema::create('people_people_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('people_id');
            $table->unsignedInteger('people_category_id');
            $table->timestamps();

            $table->foreign('people_id')->references('id')->on('people');
            $table->foreign('people_category_id')->references('id')->on('people_categories');
        });

        // People Attribute Types
        Schema::create('people_attribute_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        // People Telephones
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

        // People Emails
        Schema::create('people_emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('people_id');
            $table->unsignedInteger('people_attribute_type_id')->nullable();
            $table->string('email');
            $table->timestamps();

            $table->foreign('people_id')->references('id')->on('people');
            $table->foreign('people_attribute_type_id')->references('id')->on('people_attribute_types');
        });

        // People Addresses
        Schema::create('people_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('people_id');
            $table->unsignedInteger('people_attribute_type_id')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('locality')->nullable();
            $table->string('streetAddress');
            $table->timestamps();

            $table->foreign('people_id')->references('id')->on('people');
            $table->foreign('people_attribute_type_id')->references('id')->on('people_attribute_types');
        });

        // People Notes
        Schema::create('people_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('people_id');
            $table->string('title');
            $table->text('message');
            $table->timestamps();

            $table->foreign('people_id')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_categories');
        Schema::dropIfExists('people');
        Schema::dropIfExists('people_people_categories');
        Schema::dropIfExists('people_attribute_types');
        Schema::dropIfExists('people_telephones');
        Schema::dropIfExists('people_emails');
        Schema::dropIfExists('people_addresses');
        Schema::dropIfExists('people_notes');
    }
}
