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
            $table->string('title');
            $table->text('description');
            $table->integer('listing_type_menu')->unsigned()->default(0);
            $table->string('location');
            $table->float('lat');
            $table->float('lng');
            $table->string('phone');
            $table->text('company_tagline')->nullable();
            $table->text('company_website')->nullable();
            $table->text('company_facebook')->nullable();
            $table->text('company_email')->nullable();
            $table->text('company_twitter')->nullable();
            $table->text('company_instagram')->nullable();
            $table->string('fetured_post')->nullable();
            $table->integer('rate')->unsigned()->default(0);
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
