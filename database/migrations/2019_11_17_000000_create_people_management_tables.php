<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

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
        Schema::create(Config::get('people.tables.categories'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        // People
        Schema::create(Config::get('people.tables.people'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // People - People Categories
        Schema::create(Config::get('people.tables.people_categories'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('people_id');
            $table->unsignedInteger('people_category_id');
            $table->timestamps();

            $table->foreign('people_id')
                ->references('id')
                ->on(Config::get('people.tables.people'))
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('people_category_id')
                ->references('id')
                ->on(Config::get('people.tables.categories'))
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        // People Attribute Types
        Schema::create(Config::get('people.tables.attribute_types'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        // People Telephones
        Schema::create(Config::get('people.tables.telephones'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('people_id');
            $table->unsignedInteger('people_attribute_type_id')->nullable();
            $table->string('country_code')->nullable();
            $table->string('area_code')->nullable();
            $table->string('telephone');
            $table->timestamps();

            $table->foreign('people_id')
                ->references('id')
                ->on(Config::get('people.tables.people'))
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('people_attribute_type_id')
                ->references('id')
                ->on(Config::get('people.tables.attribute_types'))
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        // People Emails
        Schema::create(Config::get('people.tables.emails'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('people_id');
            $table->unsignedInteger('people_attribute_type_id')->nullable();
            $table->string('email');
            $table->timestamps();

            $table->foreign('people_id')
                ->references('id')
                ->on(Config::get('people.tables.people'))
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('people_attribute_type_id')
                ->references('id')
                ->on(Config::get('people.tables.attribute_types'))
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        // People Addresses
        Schema::create(Config::get('people.tables.addresses'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('people_id');
            $table->unsignedInteger('people_attribute_type_id')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('locality')->nullable();
            $table->string('streetAddress');
            $table->timestamps();

            $table->foreign('people_id')
                ->references('id')
                ->on(Config::get('people.tables.people'))
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('people_attribute_type_id')
                ->references('id')
                ->on(Config::get('people.tables.attribute_types'))
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        // People Notes
        Schema::create(Config::get('people.tables.notes'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('people_id');
            $table->string('title');
            $table->text('message');
            $table->timestamps();

            $table->foreign('people_id')
                ->references('id')
                ->on(Config::get('people.tables.people'))
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('people.tables.telephones'));
        Schema::dropIfExists(Config::get('people.tables.emails'));
        Schema::dropIfExists(Config::get('people.tables.addresses'));
        Schema::dropIfExists(Config::get('people.tables.notes'));
        Schema::dropIfExists(Config::get('people.tables.attribute_types'));
        Schema::dropIfExists(Config::get('people.tables.people_categories'));
        Schema::dropIfExists(Config::get('people.tables.categories'));
        Schema::dropIfExists(Config::get('people.tables.people'));
    }
}
