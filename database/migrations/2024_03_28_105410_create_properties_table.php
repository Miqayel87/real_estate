<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->unsignedInteger('rooms');
            $table->unsignedInteger('area');
            $table->unsignedInteger('bedrooms');
            $table->unsignedInteger('bathrooms');
            $table->string('building_age');
            $table->string('parking');
            $table->string('cooling');
            $table->string('heating');
            $table->string('sewer');
            $table->string('water');
            $table->string('exercise_room');
            $table->string('storage_room');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('property_status')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('property_type')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
