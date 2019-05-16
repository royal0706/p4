<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            # Create a Primary, Auto-Incrementing column named `id`
            $table->bigIncrements('id');

            # This generates two columns: `created_at` and `updated_at` to
            # keep track of changes to a row
            $table->timestamps();

            # The rest of the columns...
            $table->string('destination')->nullable(); # Example of a column modifier
            $table->string('traveler_id');
            $table->string('hotel');
            $table->string('meal');
            $table->string('attraction');
            $table->string('photo_url');
               });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
