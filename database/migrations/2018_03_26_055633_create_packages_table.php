<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('listing_type_menu'); // What to do
            $table->string('location');
            $table->float('lat');
            $table->float('lng');
            $table->string('phone');
            $table->text('company_tagline');
            $table->text('company_website');
            $table->text('company_facebook');
            $table->text('company_email');
            $table->text('company_twitter');
            $table->text('company_instagram');
            $table->string('fetured_post');
            $table->string('rate');
            $table->string('background_image')->nullable();
            $table->string('profile_image')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
