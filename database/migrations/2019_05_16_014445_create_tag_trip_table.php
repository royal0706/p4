<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_trip', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('trip_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();

            $table->foreign('trip_id')->references('id')->on('trips');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tag_trip');
    }
}
