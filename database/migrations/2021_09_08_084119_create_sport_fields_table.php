<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_fields', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable()->default(null);
            $table->integer('field_number')->nullable()->default(null);
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('country_id')->constrained('countries');
            $table->integer('longitude')->nullable()->default(null);
            $table->integer('latitude')->nullable()->default(null);
            $table->integer('number_of_courts');
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
        Schema::dropIfExists('sport_fields');
    }
}
