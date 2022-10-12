<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentAmenityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenity_apartment', function (Blueprint $table) {
            $table->unsignedBigInteger('apartment_id');
                $table->foreign('apartment_id')
                ->references('id')
                ->on('apartments')
                ->onDelete('cascade');

            $table->unsignedBigInteger('amenity_id');
                $table->foreign('amenity_id')
                ->references('id')
                ->on('amenities')
                ->onDelete('cascade');

            $table->primary(['apartment_id', 'amenity_id']);
            
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
        Schema::dropIfExists('amenity_apartment');
    }
}
