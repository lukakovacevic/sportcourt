<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->foreignId('country_id')->constrained('countries');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role_id')->constrained('roles');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'username' => 'admin',
            'country_id' => 1,
            'email' => 'admin@admin.com',
            'password' => Hash::make('test1234'),
            'role_id' => 1
        ]);
        DB::table('users')->insert([
            'username' => 'prvi',
            'country_id' => 1,
            'email' => 'prvi@prvi.com',
            'password' => Hash::make('test1234'),
            'role_id' => 2
        ]);
        DB::table('users')->insert([
            'username' => 'drugi',
            'country_id' => 1,
            'email' => 'drugi@drugi.com',
            'password' => Hash::make('test1234'),
            'role_id' => 2
        ]);
        DB::table('users')->insert([
            'username' => 'treci',
            'country_id' => 1,
            'email' => 'treci@treci.com',
            'password' => Hash::make('test1234'),
            'role_id' => 2
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
