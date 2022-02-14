<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('location', 255);
            $table->integer('floor');
            $table->integer('bedrooms');
            $table->integer('car_spaces');
            $table->integer('living_spaces')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('area');
            $table->decimal('price', 12, 2);
            $table->string('status', 10)->default('available');
            $table->dateTime('date_sell_from')->nullable();
            $table->dateTime('date_sell_to')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
