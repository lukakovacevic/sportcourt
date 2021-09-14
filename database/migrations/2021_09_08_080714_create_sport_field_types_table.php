<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSportFieldTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_field_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->unsignedInteger('max_players');
            $table->timestamps();
        });

        DB::table('sport_field_types')->insert(['type' => 'football', 'max_players' => 30]);
        DB::table('sport_field_types')->insert(['type' => 'footsal', 'max_players' => 15]);
        DB::table('sport_field_types')->insert(['type' => 'basketball', 'max_players' => 15]);
        DB::table('sport_field_types')->insert(['type' => 'volleyball', 'max_players' => 18]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_field_types');
    }
}
