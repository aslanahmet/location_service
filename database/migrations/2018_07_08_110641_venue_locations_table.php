<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VenueLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venue_locations', function (Blueprint $table) {
            $table->unsignedInteger('venue_id');

            $table->increments('id');
            $table->foreign('venue_id')->references('id')->on('venues');
            $table->string('address', 255);
            $table->string('crossStreet', 255);
            $table->string('lat', 255);
            $table->string('lng', 255);
            $table->string('postalCode', 255);
            $table->string('cc', 255);
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('country', 255);

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
        Schema::dropIfExists('venue_locations');
    }
}
